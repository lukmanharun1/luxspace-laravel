<?php

namespace App\Http\Controllers;

use App\Http\Requests\RoomRequest;
use App\Models\Room;
use Illuminate\Database\QueryException;
use App\Http\Requests\UpdateRoomRequest;

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
        $data = [
            'rooms' => $rooms
        ];
        return view('dashboard', $data);
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
        $imageName = $uploadImage->getClientOriginalName() . '-' . uniqid() . '.' . $uploadImage->extension();
        $uploadImage->move(public_path(env('PATH_UPLOAD', 'images/upload_images/')), $imageName);
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
        return view('rooms.details', ['room' => $room]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function edit(Room $room)
    {
        return view('rooms.edit', ['room' => $room]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function deleteFileImage($nameImages = [])
    {
        foreach ($nameImages as $nameImage) {
            $pathFileImage = public_path(env('PATH_UPLOAD', 'images/upload_images/') . $nameImage);
            if (file_exists($pathFileImage)) {
                @unlink($pathFileImage);
            }
        }
    }
    public function update(UpdateRoomRequest $request, Room $room)
    {
        $oldImages = [
            'image1' => null,
            'image2' => null,
            'image3' => null,
            'image4' => null,
            'image5' => null
        ];
        $newImages = [
            'image1' => null,
            'image2' => null,
            'image3' => null,
            'image4' => null,
            'image5' => null
        ];
        // check image 1
        if ($request->file('image1') !== null) {
            $newImages['image1'] = $this->uploadImage($request, 'image1');
            $oldImages['image1'] = $room->image1;
        }
        // check image 2
        if ($request->file('image2') !== null) {
            $newImages['image2'] = $this->uploadImage($request, 'image2');
            $oldImages['image2'] = $room->image2;
        }
        // check image 3
        if ($request->file('image3') !== null) {
            $newImages['image3'] = $this->uploadImage($request, 'image3');
            $oldImages['image3'] = $room->image3;
        }
        // check image 4
        if ($request->file('image4') !== null) {
            $newImages['image4'] = $this->uploadImage($request, 'image4');
            $oldImages['image4'] = $room->image4;
        }
        // check image 5
        if ($request->file('image5') !== null) {
            $newImages['image5'] = $this->uploadImage($request, 'image5');
            $oldImages['image5'] = $room->image5;
        }
        // hapus data lama
        if ($oldImages) {
            $this->deleteFileImage($oldImages);
        }
        try {
            // update data room
            $updateDataRoom = [
                'name_product' => $request->name_product,
                'category' => $request->category,
                'price' => $request->price,
                'about_product' => $request->about_product,
                'image1' => $newImages['image1'] ? $newImages['image1'] : $room->image1,
                'image2' => $newImages['image2'] ? $newImages['image2'] : $room->image2,
                'image3' => $newImages['image3'] ? $newImages['image3'] : $room->image3,
                'image4' => $newImages['image4'] ? $newImages['image4'] : $room->image4,
                'image5' => $newImages['image5'] ? $newImages['image5'] : $room->image5
            ];
            $room->update($updateDataRoom);
            return redirect('/dashboard')->with([
                'status' => 'success',
                'message' => "Data product <span class='font-semibold'>$request->name_product</span> update successfully"
            ]);
        } catch (QueryException $e) {
            return redirect('/dashboard')->with([
                'status' => 'failed',
                'message' => "Data product <span class='font-semibold'>$request->name_product</span> failed to update"
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Room  $room
     * @return \Illuminate\Http\Response
     */

    public function destroy(Room $room)
    {
        $images = [
            'image1' => $room->image1,
            'image2' => $room->image2,
            'image3' => $room->image3,
        ];

        // check upload image 4
        if ($room->image4 !== null) {
            $images['image4'] = $room->image4;
        }
        // check upload image 5
        if ($room->image5 !== null) {
            $images['image5'] = $room->image5;
        }
        try {
            $this->deleteFileImage($images);
            $room->delete();
            return redirect('/dashboard')->with([
                'status' => 'success',
                'message' => "Data product <span class='font-semibold'>$room->name_product</span> delete successfully"
            ]);
        } catch (QueryException $e) {
            return redirect('/dashboard')->with('data', [
                'status' => 'failed',
                'message' => "Data product <span class='font-semibold'>$room->name_product</span> failed to delete"
            ]);
        }
    }
}
