<?php

namespace App\Http\Controllers;

use App\Mail\SuccessTransactionEmail;
use App\Models\ShippingDetail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Database\QueryException;

class TransaksiController extends Controller
{
    public function pembayaran($token)
    {
       try {
            // validasi token
            $shippingDetails = ShippingDetail::where('token', '=', $token)->get();
            if (count($shippingDetails) !== 0) {
                // send email pembayaran
                // ambil id shippingDetails untuk relasi one to many
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
                $shippingDetails[0]->image_courier = $courier[$shippingDetails[0]->courier];
                $shippingDetails[0]->image_payment = $payment[$shippingDetails[0]->payment];

                $dataShopping = ShippingDetail::find($shippingDetails[0]->id)->shoppingCart;
                // ubah token menjadi kosong 
                ShippingDetail::where('token', '=', $token)->update(['token' => '']);
                Mail::to($shippingDetails[0]->email_address)->send(new SuccessTransactionEmail(
                    $shippingDetails[0], $dataShopping, $shippingDetails[0]->total_price
                ));
                // hapus cookie cart
                setcookie('cart', '', time() - 60 * 60 * 24 * 7, '/');
                return view('success');
            } else {
                return abort(404);
            }
       } catch (QueryException $e)
       {
           return $e->getMessage();
       }
    }
}
