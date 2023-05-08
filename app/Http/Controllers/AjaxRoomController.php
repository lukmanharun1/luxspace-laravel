<?php

namespace App\Http\Controllers;

use App\Models\Room;
use Illuminate\Http\Request;

class AjaxRoomController extends Controller
{
    private $coloms =  ['id', 'name_product', 'category', 'price', 'image1', 'image2', 'image3'];
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rooms = Room::all($this->coloms);
        $data = [
            'rooms' => $rooms
        ];
        return view('rooms.ajax.allData', $data);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($category)
    {
        $rooms = Room::where('category', '=', $category)->get($this->coloms);
        return view('rooms.ajax.allData', ['rooms' => $rooms]);
    }

    public function showAllRoom($productPrice)
    {
        $rooms = Room::where('name_product', 'like', "%$productPrice%")
            ->orWhere('price', 'like', "%$productPrice%")
            ->get($this->coloms);
        return view('rooms.ajax.allData', ['rooms' => $rooms]);
    }

    public function showProductPrice($category, $productPrice)
    {
        $rooms = Room::where('category', '=', $category)
            ->where('name_product', 'like', "%$productPrice%")
            ->orWhere('price', 'like', "%$productPrice%")
            ->get($this->coloms);

        return view('rooms.ajax.allData', ['rooms' => $rooms]);
    }
}
