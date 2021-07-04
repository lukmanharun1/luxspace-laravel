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
        
        $dataShopping = collect();
        if (isset($_COOKIE['cart'])) {
            $cookieCart = json_decode($_COOKIE['cart']);
            
            // ambil semua data yang ada di cookie
            $shoppingCart = Room::whereIn('id', $cookieCart)
                                    ->get(['id', 'image1', 'name_product', 'category', 'price']);

           
            // buat token format nya email-waktuSekarang-uniqid
            $token = hash('sha256', $request->email . '-' . now() . '-' . uniqid());
            
            try {
                // insert data
                // menampilkan keranjang belanja ada yang sama
               $total = $this->getTotal($cookieCart, $shoppingCart);
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
                
                $idShipping = ShippingDetail::create($create)->id;
                foreach ($cookieCart as $valueCookie) {
                    foreach ($shoppingCart as $shopping) {
                        if ($valueCookie === $shopping->id) {
                            $dataShopping->push([
                                'id_shipping_details' => $idShipping,
                                'photo' => $shopping->image1,
                                'name_product' => $shopping->name_product,
                                'category' => $shopping->category,
                                'price' => $shopping->price
                            ]);
                        }
                    }
                }
                
                $dataShopping->all();
                
                ShoppingCart::insert($dataShopping->toArray());
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
                 // set session -> untuk cek email
                 session(['cek-email' => true]);
                return redirect('/cek-email');
            } catch (QueryException $e) {
                return $e->getMessage();
            }
        }
        return abort(404);
    }
    private function getTotal($cookieCart, $shoppingCart)
    {
        $price = [];
        $total = 0;
        foreach ($cookieCart as $valueCookie) {
            foreach ($shoppingCart as $shopping) {
                if ($valueCookie === $shopping->id) {
                    array_push($price, $shopping->price);
                   
                }
            }
        }
        
        foreach ($price as $cart) {
            $total += $cart;
        }
        return $total;
    }

    public function cekEmail(Request $request)
    {
        // cek session shipping
        if ($request->session()->get('cek-email')) {
            // hapus session 
            // $request->session()->forget('shipping');
            return view('cek-email');
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
