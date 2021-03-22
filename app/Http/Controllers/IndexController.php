<?php

namespace App\Http\Controllers;

use App\Models\Room;
use Illuminate\Http\Request;


class IndexController extends Controller
{
    public function index()
    {
        $categories = [
            'all_room' => 0,
            'living_room' => 0,
            'children_room' => 0,
            'decoration_room' => 0,
            'bed_room' => 0,
        ];
        $allDataRoom = Room::all('category');
        foreach ($allDataRoom as $dataRoom) {
            if ($dataRoom->category === 'bed_room') {
                // count bed_room
                $categories['bed_room'] += 1;
            } else if ($dataRoom->category === 'living_room') {
                // count living_room
                $categories['living_room'] += 1;
            } else if ($dataRoom->category === 'children_room') {
                // count children_room
                $categories['children_room'] += 1;
            } else if ($dataRoom->category === 'decoration_room') {
                // count decoration_room
                $categories['decoration_room'] += 1;
            } else {
                // count all_room 
                $categories['all_room'] += 1;
            }
        }
        $justArrived = Room::where('category', '=', 'all_room')
                            ->limit(8)
                            ->get(['id', 'name_product', 'price', 'image1']);
        return view('index', [
            'living_room' => $categories['all_room'] + $categories['living_room'],
            'children_room' => $categories['all_room'] + $categories['children_room'],
            'decoration_room' => $categories['all_room'] + $categories['decoration_room'],
            'bed_room' => $categories['all_room'] + $categories['bed_room'],
            'just_arrived' => $justArrived
        ]);
    }

    private function pagination($category)
    {
        return Room::select(['id', 'name_product', 'price', 'image1'])
                        ->whereIn('category', ['all_room', $category])
                        ->paginate(8);
    }
    public function show($category)
    {
        $rooms = $this->pagination($category);
        return view('categoryRooms', ['category' => $rooms]);
    }

    public function showPagination($category) 
    {
        $rooms = $this->pagination($category);
        return view('ajax-pagination.pagination', ['category' => $rooms]);
    }

    public function details(Room $room)
    {
        $allRoom = Room::where('category', '=', 'all_room')
                        ->orderBy('name_product', 'asc')
                        ->limit(4)
                        ->get(['id', 'image1', 'name_product', 'price']);
        return view('details', [
            'details' => $room,
            'all_room' => $allRoom
        ]);
    }

    public function addToCart($id) {
        $valueCart = Room::select('id')->findOrFail($id);
        $tujuhHari = time() + 60 * 60 * 24 * 7;
        
        if (isset($_COOKIE['cart'])) {
            // kalau ada kerajang belanja maka tambahkan
            $cart = json_decode($_COOKIE['cart'], true);
            array_push($cart, $valueCart->id);           
            setcookie('cart', json_encode($cart), $tujuhHari, '/');
            return redirect('/cart');
        } else {
            // kalau tidak ada kerajang belanja maka tambahkan
            $value = json_encode([$valueCart->id]);
            setcookie('cart', $value, $tujuhHari, '/');
            return redirect('/cart');
        }
    }

    public function cart()
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
        }
        return view('cart', [
            'shopping_cart' => $dataShopping,
            'total' => $total
        ]);
    }
}