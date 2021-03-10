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
      <h2 class="text-3xl text-center font-semibold -mt-8">Form Edit data rooms</h2>
    </div>
  </header>
 <!-- END: Header -->

 {{-- START: form --}}
  <form action="" method="POST" enctype="multipart/form-data" class="py-6">
    @csrf
    @method('put')
    <div class="w-3/12 mx-auto">
      {{-- name product --}}
      <label for="name-product" class="block mb-1">Name product</label>
      <input 
        type="text" 
        name="name_product"
        class="w-full rounded-lg px-4 py-2 bg-white text-sm focus:border-blue-200 focus:outline-none" 
        id="name-product"
        value="{{ $room->name_product }}"
        
      />
      @error('name_product')
        <span class="text-red-500 font-semibold">{{ $message }}</span>
      @enderror
      {{-- category --}}
      <label for="category" class="block my-1">Category</label>
      <select 
        name="category" 
        id="category" 
        class="w-full rounded-lg px-4 py-2 bg-white text-sm focus:border-blue-200 focus:outline-none" 
        
       >
        <option value="all_room" @if ($room->category === 'all_room') selected @endif>All room</option>
        <option value="living_room" @if ($room->category === 'living_room') selected @endif>Living room</option>
        <option value="children_room" @if ($room->category === 'children_room') selected @endif>Children room</option>
        <option value="decoration_room" @if ($room->category === 'decoration_room') selected @endif>Decoration room</option>
        <option value="bed_room" @if ($room->category === 'bed_room') selected @endif>Bed room</option>
      </select>
      @error('category')
        <span class="text-red-500 font-semibold">{{ $message }}</span>
      @enderror
      {{-- price --}}
      <label for="price" class="block my-1">Price</label>
      <div class="relative">
        <input 
          type="number" 
          name="price"
          class="w-full rounded-lg px-4 py-2 pl-11 bg-white text-sm focus:border-blue-200 focus:outline-none" 
          id="price" 
          value="{{ $room->price }}"
        />
        <div class="absolute top-2 left-3">IDR</div>
      </div>
      @error('name_product')
        <span class="text-red-500 font-semibold">{{ $message }}</span>
      @enderror
      {{-- about product --}}
      <label for="about-product" class="block my-1">About product</label>
      <textarea 
        name="about_product" 
        id="about-product" 
        cols="30" 
        rows="4"
        class="w-full rounded-lg px-4 py-2 bg-white text-sm focus:border-blue-200 focus:outline-none" 
        
        >
        {{ $room->about_product }}
      </textarea>
      @error('about_product')
       <span class="text-red-500 font-semibold">{{ $message }}</span>
      @enderror
      {{-- upload image --}}
      <h3 class="text-center font-semibold text-lg mt-4">Upload image</h3>
      {{-- image 1 --}}
      <label for="image1" class="block my-1">
        Image 1
        <span class="text-gray-400">(Change image?)</span>
      </label>
      <img 
        src="{{ asset('images/upload_images/' . $room->image1) }}" 
        alt="upload image 1"
        height="70"
        width="90"
      />
      <input 
        type="file" 
        name="image1"
        class="w-full rounded-lg px-4 py-2 bg-white text-sm focus:border-blue-200 focus:outline-none" 
        id="image1"
      />
      @error('image1')
       <span class="text-red-500 font-semibold">{{ $message }}</span>
      @enderror
      {{-- image 2 --}}
      <label for="image2" class="block my-1">
        Image 2
        <span class="text-gray-400">(Change image?)</span>
      </label>
      <img 
        src="{{ asset('images/upload_images/' . $room->image2) }}" 
        alt="upload image 2"
        height="70"
        width="90"
      />
      <input 
        type="file" 
        name="image2"
        class="w-full rounded-lg px-4 py-2 bg-white text-sm focus:border-blue-200 focus:outline-none" 
        id="image2"
      />
      @error('image2')
        <span class="text-red-500 font-semibold">{{ $message }}</span>
      @enderror
      {{-- image 3 --}}
      <label for="image3" class="block my-1">
        Image 3
        <span class="text-gray-400">(Change image?)</span>
      </label>
      <img 
        src="{{ asset('images/upload_images/' . $room->image3) }}" 
        alt="upload image 3"
        height="70"
        width="90"
      />
      <input 
        type="file"
        name="image3"
        class="w-full rounded-lg px-4 py-2 bg-white text-sm focus:border-blue-200 focus:outline-none" 
        id="image3"
      />
      @error('image3')
        <span class="text-red-500 font-semibold">{{ $message }}</span>
      @enderror
      {{-- image 4 --}}
      <label for="image4" class="block my-1">
        Image 4
        <span class="text-gray-400">(Change image?)</span>
      </label>
      <img 
        src="{{ asset('images/upload_images/' . $room->image4) }}" 
        alt="not found"
        height="70"
        width="90"
      />
      <input 
        type="file" 
        name="image4"
        class="w-full rounded-lg px-4 py-2 bg-white text-sm focus:border-blue-200 focus:outline-none" 
        id="image4"
      />
      {{-- image 5 --}}
      <label for="image5" class="block my-1">
        Image 5
        <span class="text-gray-400">(Change image?)</span>
      </label>
      <img 
        src="{{ asset('images/upload_images/' . $room->image5) }}" 
        alt="not found"
        height="70"
        width="90"
      />
      <input 
        type="file" 
        name="image5"
        class="w-full rounded-lg px-4 py-2 bg-white text-sm focus:border-blue-200 focus:outline-none" 
        id="image5"
      />
      <button 
        type="submit"
        class="bg-pink-400 text-black hover:bg-black hover:text-pink-400 focus:outline-none rounded-full px-8 py-3 w-full mt-5 transition duration-200"
      >&#9998; Edit data rooms</button>
    </div>
  </form>
 {{-- END: form --}}
 @endsection