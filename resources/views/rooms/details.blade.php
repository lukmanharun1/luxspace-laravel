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
      <h2 class="text-3xl text-center font-semibold -mt-8">Details data rooms</h2>
    </div>
  </header>
 <!-- END: Header -->

  {{-- START: Details --}}
  <div class="mx-auto w-1/3 max-h-full">
   {{-- name product --}}
   <div class="border border-solid border-pink-400 p-2 my-1 rounded-sm">
     <p>
       Name product : <b>{{ $room->name_product }}</b>
     </p>
   </div>
   
   {{-- price --}}
   <div class="border border-solid border-pink-400 p-2 my-1 rounded-sm">
    <p>
      Price : IDR <b>{{ number_format($room->price,0, ',', '.') }}</b>
    </p>
   </div>

    {{-- category --}}
    <div class="border border-solid border-pink-400 p-2 my-1 rounded-sm">
      <p>
        Category : <b>{{ $room->category }}</b>
      </p>
    </div>

   {{-- about product --}}
   <div class="border border-solid border-pink-400 p-2 my-1 rounded-sm overflow-scroll h-52">
    <p>
      About product : <b class="block">{{ $room->about_product }}</b>
    </p>
   </div>
   <div class="border border-solid border-pink-400 p-2 my-1 rounded-sm">
     <div class="flex flex-wrap justify-center">
        {{-- image 1 --}}
        {{-- <p>Image 1</p> --}}
        <img 
          src="{{ asset('images/upload_images/' . $room->image1) }}" 
          alt="image 2"
          width="133"
          height="150"
          
        />
        {{-- image 2 --}}
        {{-- <p>Image 2</p> --}}
        <img 
          src="{{ asset('images/upload_images/' . $room->image2) }}" 
          alt="image 2"
          width="133"
          height="150"
          class="mx-2"
        />
        {{-- image 3 --}}
        {{-- <p>Image 3</p> --}}
        <img 
          src="{{ asset('images/upload_images/' . $room->image3) }}" 
          alt="image 3"
          width="133"
          height="150"
          
        />
            {{-- image 4 --}}
        {{-- <p>Image 4</p> --}}
        <img 
        src="{{ asset('images/upload_images/' . $room->image4) }}" 
        alt="not found"
        width="133"
        height="150"
        class="mt-2"
      />
      {{-- image 5 --}}
      {{-- <p>Image 5</p> --}}
      <img 
        src="{{ asset('images/upload_images/' . $room->image5) }}" 
        alt="not found"
        width="133"
        height="150"
        class="ml-2 mt-2"
      />
      </div>
    </div>
    {{-- action --}}
    <div class="border border-solid border-pink-400 p-2 my-1 rounded-sm">
      <p class="inline">Action :</p>
      {{-- edit --}}
      <a href="/dashboard/edit/{{ $room->id }}" 
        class="bg-pink-400 px-3 rounded-sm text-2xl hover:bg-black hover:text-pink-400">&#9998;</a>
      {{-- hapus --}}
      <form action="/dashboard/delete/{{ $room->id }}" method="POST" class="inline">
        @csrf
        @method('delete')
        <button type="submit" 
          class="bg-pink-400 px-3 rounded-sm text-2xl focus:outline-none" onclick="return confirm('are you sure you delete {{ $room->name_product }}?')">
          &#128465;
        </button>
      </form>
     </div>
  </div>
  {{-- END: Details --}}

@endsection