<?php

namespace App\Http\Controllers;

use App\Http\Requests\ShippingDetailsRequest;
use App\Mail\ShippingDetailsEmail;
use App\Models\Room;
use App\Models\ShippingDetail;
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
        $total = 0;
        $dataShopping = collect();
        if (isset($_COOKIE['cart'])) {
            $cookieCart = json_decode($_COOKIE['cart']);
            
            // ambil semua data yang ada di cookie
            $shoppingCart = Room::whereIn('id', $cookieCart)
                                    ->get(['id', 'image1', 'name_product', 'category', 'price']);

            // menampilkan keranjang belanja ada yang sama
    
            foreach ($cookieCart as $valueCookie) {
                foreach ($shoppingCart as $shopping) {
                    if ($valueCookie === $shopping->id) {
                        $dataShopping->push([
                            'image1' => $shopping->image1,
                            'name_product' => $shopping->name_product,
                            'price' => $shopping->price
                        ]);
                    }
                }
            }
            $dataShopping->all();
            foreach ($dataShopping as $cart) {
                $total += $cart['price'];
            }
            // insert data
            // buat token format nya email-waktuSekarang
            $token = hash('sha256', $request->email . '-' . now());
            $create = [
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
            try {
                // set session -> untuk cek email
                session(['shipping' => true]);
                // insert data
                ShippingDetail::create($create);
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
                    $shippingDetails, $dataShopping, $total, $token
                ));
                return redirect('/cek-email');
            } catch (QueryException $e) {
                echo $e->getMessage();
            }
        } 
    }

    public function cekEmail(Request $request)
    {
        // cek session shipping
        if ($request->session()->get('shipping')) {
            // hapus session 
            // $request->session()->forget('shipping');
            return view('periksa-email');
        }
        return abort(404);
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
