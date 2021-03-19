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
}