@extends('layouts.struktur-html')
@section('title', 'Luxspace ~ Saingan IKEA')
@push('include-css')
  <link rel="stylesheet" href="{{ asset('css/app.css') }}" />
@endpush
@section('content')
  <!-- START: Header -->
  <header class="w-full z-50 px-4">
    <div class="container mx-auto py-5">
      <div class="flex flex-strech items-center">
        <div class="w-56 flex items-center">
          <a href="/dashboard">
            <img
              src="{{ asset('images/design/logo.svg') }}"
              alt="Luxspace ~ Adalah sebuah website yang menjual barang-barang kece"
            />
          </a>
        </div>
      </div>
    </div>
  </header>
 <!-- END: Header -->
  {{-- START: add product --}}
  <section class="px-6 py-10">
    <a href="/dashboard/add" 
    class="bg-pink-400 text-black p-4 rounded-md font-semibold hover:bg-black hover:text-pink-400">
    &plus;
    Add Product
    </a>
  </section>
  {{-- END: add product --}}
  {{-- START: TABLE --}}
  <section class="mx-3 mr-5">
    <table class="text-center border border-solid border-black w-full mx-2">
      <thead class="bg-pink-400">
        <tr class="border border-solid border-black">
          <th class="py-2 border border-solid border-black">#</th>
          <th class="py-2 border border-solid border-black">Action</th>
          <th class="py-2 border border-solid border-black">Name product</th>
          <th class="py-2 border border-solid border-black">Category</th>
          <th class="py-2 border border-solid border-black">Price</th>
          <th class="py-2 border border-solid border-black">Image 1</th>
          <th class="py-2 border border-solid border-black">Image 2</th>
          <th class="py-2 border border-solid border-black">Image 3</th>
        </tr>
      </thead>
      <tbody>
        @forelse($rooms as $i => $room)
          <tr>
            <td class="border border-solid border-black">{{ ++$i }}</td>
            <td class="border border-solid border-black p-1">
              {{-- edit --}}
              <a href="/dashboard/edit/{{ $room->id }}" 
                class="bg-pink-400 px-3 rounded-sm text-2xl hover:bg-black hover:text-pink-400">&#9998;</a>
              {{-- hapus --}}
              <a href="/dashboard/delete/{{ $room->id }}" 
                class="bg-pink-400 px-3 rounded-sm text-2xl">&#128465;</a>
              {{-- details --}}
              <a href="/dashboard/details/{{ $room->id }}" 
                class="bg-pink-400 px-3 rounded-sm text-2xl hover:bg-black hover:text-pink-400">&#8505;</a>
            </td>
            {{-- name product --}}
            <td class="border border-solid border-black">{{ $room->name_product }}</td>
            {{-- category --}}
            <td class="border border-solid border-black">{{ $room->category }}</td>
            {{-- price --}}
            <td class="border border-solid border-black">IDR {{ number_format($room->price,0, ',', '.') }}</td>
            {{-- image 1 --}}
            <td class="border border-solid border-black">
              <img 
                src="{{ asset('images/upload_image/' . $room->image1) }}" 
                alt="upload image 1"
                height="60"
                width="60"
              
              />
            </td>
            {{-- image 2 --}}
            <td class="border border-solid border-black">
              <img 
                src="{{ asset('images/upload_image/' . $room->image2) }}" 
                alt="upload image 2"
                height="60"
                width="60"
              />
            </td>
            {{-- image 3 --}}
            <td class="border border-solid border-black">
              <img 
                src="{{ asset('images/upload_image/' . $room->image3) }}" 
                alt="upload image 3"
                height="60"
                width="60"
              />
            </td>
          </tr>
        @empty
          
        @endforelse
        
      </tbody>
    </table>
  </section>
  {{-- END: TABLE --}}
  
@endsection