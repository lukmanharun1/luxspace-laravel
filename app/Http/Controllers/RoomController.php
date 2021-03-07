<?php

namespace App\Http\Controllers;

use App\Http\Requests\RoomRequest;
use App\Models\Room;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $coloms = ['id', 'name_product', 'category', 'price', 'image1', 'image2', 'image3'];
        $rooms = Room::all($coloms);
        return view('dashboard', [
            'rooms' => $rooms
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('rooms.add');
    }
    public function uploadImage($request, $key)
    {
        $uploadImage = $request->file($key);
        $pathUpload = 'images/upload_image';
        $imageName = $uploadImage->getClientOriginalName() . '-' . uniqid() . '.' . $uploadImage->extension();
        $uploadImage->move(public_path($pathUpload), $imageName);
        return $imageName;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RoomRequest $request)
    {
        $image4 = null;
        $image5 = null;
        // check upload image 4
       if ($request->file('image4') !== null) {
            $image4 = $this->uploadImage($request, 'image4');
       } 
        // check upload image 5
        if ($request->file('image5') !== null) {
            $image5 = $this->uploadImage($request, 'image5');
        }
        try {
            $nameProduct = $request->name_product;
            $addDataRoom = [
                'name_product' => $nameProduct,
                'category' => $request->category,
                'price' => $request->price,
                'about_product' => $request->about_product,
                'image1' =>  $this->uploadImage($request, 'image1'),
                'image2' => $this->uploadImage($request, 'image2'),
                'image3' => $this->uploadImage($request, 'image3'),
                'image4' => $image4,
                'image5' => $image5

            ];
           
            Room::create($addDataRoom);
            return redirect('/dashboard')->with([
                'status' => 'success',
                'message' => "Data product <span class='font-semibold'>$nameProduct</span> added successfully"
            ]);
        } catch (QueryException $e) {
            return 'test';
            return redirect('/dashboard')->with('data', [
                'status' => 'failed',
                'message' => "Data product <span class='font-semibold'>$nameProduct</span> failed to add"
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function show(Room $room)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function edit(Room $room)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Room $room)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function destroy(Room $room)
    {
        //
    }
}
