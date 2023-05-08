<?php

namespace App\Http\Controllers;

use App\Http\Requests\ShippingDetailsRequest;
use App\Mail\ShippingDetailsEmail;
use App\Models\Room;
use App\Models\ShippingDetail;
use App\Models\ShoppingCart;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ShippingDetailsController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ShippingDetailsRequest $request)
    {
        // initialisasi
        if (empty($_COOKIE['cart'])) {
            return abort(404);
        }

        $idRooms = json_decode($_COOKIE['cart']);

        // ambil semua data yang ada di cookie
        $shoppingCart = Room::whereIn('id', $idRooms)
            ->get(['id', 'image1', 'name_product', 'category', 'price']);
        if (!$shoppingCart) {
            return abort(404);
        }

        // buat token format nya email-waktuSekarang-uniqid
        $token = hash('sha256', $request->email . '-' . now() . '-' . uniqid());

        try {
            // insert data
            // menampilkan keranjang belanja ada yang sama
            $total = $this->getTotal($shoppingCart);
            $createShppingDetail = [
                'name' => $request->name,
                'email_address' => $request->email_address,
                'address' => $request->address,
                'phone_number' => $request->phone_number,
                'courier' => $request->courier,
                'payment' => $request->payment,
                'total_price' => $total,
                'status' => 'pending',
                'token' => $token
            ];

            $idShipping = ShippingDetail::create($createShppingDetail)->id;

            $dataShopping = [];
            foreach ($shoppingCart as $shopping) {
                $now = now();
                array_push($dataShopping, [
                    'id_shipping_details' => $idShipping,
                    'photo' => $shopping->image1,
                    'name_product' => $shopping->name_product,
                    'category' => $shopping->category,
                    'price' => $shopping->price,
                    'created_at' => $now,
                    'updated_at' => $now
                ]);
            }

            ShoppingCart::insert($dataShopping);
            $courier = [
                'fedex' => 'logo-fedex.png',
                'dhl' => 'logo-dhl.png'
            ];

            $payment = [
                'american_express' => 'logo-american-express.png',
                'bitcoin' => 'logo-bitcoin.png',
                'mastercard' => 'logo-mastercard.png',
                'midtrans' => 'logo-midtrans.png'
            ];

            // data untuk send email
            $shippingDetails = [
                'your_name' => $request->name,
                'email_address' => $request->email_address,
                'address' => $request->address,
                'phone_number' => $request->phone_number,
                'image_courier' => $courier[$request->courier],
                'courier' => $request->courier,
                'image_payment' => $payment[$request->payment],
                'payment' => $request->payment
            ];

            // send Email
            Mail::to($request->email_address)->send(new ShippingDetailsEmail(
                $shippingDetails,
                $dataShopping,
                $total,
                $token
            ));
            // set session -> untuk cek email
            session(['cek-email' => true]);
            return redirect('/cek-email');
        } catch (QueryException $e) {
            return $e->getMessage();
        }
    }
    private function getTotal($shoppingCart = [])
    {
        $total = 0;
        foreach ($shoppingCart as $shopping) {
            $total += $shopping->price;
        }
        // add ppn 11%
        return $total + ($total * 0.11);
    }

    public function cekEmail(Request $request)
    {
        // cek session shipping
        if ($request->session()->get('cek-email')) {
            // hapus session 
            $request->session()->forget('cek-email');
            return view('cek-email');
        }
        return abort(404);
    }
}
