<?php

namespace App\Http\Controllers;

use App\Http\Requests\ShippingDetailsRequest;
use App\Models\Room;
use App\Models\ShippingDetail;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class ShippingDetailsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ShippingDetailsRequest $request)
    {
        // initialisasi
        $shoppingCart = [];
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
                            'id' => $shopping->id,
                            'image1' => $shopping->image1,
                            'name_product' => $shopping->name_product,
                            'category' => $shopping->category,
                            'price' => $shopping->price
                        ]);
                    }
                }
            }
            $dataShopping->all();
            foreach ($dataShopping as $cart) {
                $total += $cart['price'];
            }
            $create = [
                'name' => $request->name,
                'email_address' => $request->email_address,
                'address' => $request->address,
                'phone_number' => $request->phone_number,
                'courier' => $request->courier,
                'payment' => $request->payment,
                'total_price' => $total,
                'status' => 'success'
            ];
    
            try {
                ShippingDetail::create($create);
                return redirect('/success');
            } catch (QueryException $e) {
                echo $e->getMessage();
            }
        } 
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
