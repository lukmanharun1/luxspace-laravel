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
 
     @if (session('status') && session('message'))
      <div class="absolute top-5 left-0 right-0 text-center notification" data-message="{{ session('message') }}">
        <h3 class="@if (session('message' === 'failed')) bg-red-500 @endif bg-pink-400 inline py-4 px-12 rounded"></h3>
      </div>
      @push('include-js')
        <script src="{{ asset('js/notification.js') }}"></script>
      @endpush
    @endif
  
 {{-- END: Notification --}}
 
  {{-- START: add product --}}
  <section class="px-6 py-10 inline">
    <a href="/dashboard/add" 
    class="bg-pink-400 text-black p-4 rounded-md font-semibold hover:bg-black hover:text-pink-400">
    &plus;
    Add Product
    </a>
  </section>
  {{-- END: add product --}}
  {{-- START: search --}}
<section class="inline">
  <label for="search_category" class="mr-2">Search by category</label>
  <select 
    name="search_category" 
    id="search_category" 
    class=" rounded-lg pl-2 pr-10 py-2 bg-white text-sm focus:border-blue-200 focus:outline-none">
    <option value="all_data_rooms">All data rooms</option>
    <option value="all_room">All room</option>
    <option value="living_room">Living room</option>
    <option value="children_room">Children room</option>
    <option value="decoration_room">Decoration room</option>
    <option value="bed_room">Bed room</option>
  </select>
  <span class="relative">
    <input 
      type="text"
      class="ml-4 rounded-lg bg-white text-sm pl-8 focus:border-blue-200 focus:outline-none inline-block w-1/5"
      placeholder="Search by name product & Price" 
    />
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="w-6 h-6 absolute inline left-5 top-0 text-pink-400">
      <path 
        class="fill-current"
         d="M505 442.7L405.3 343c-4.5-4.5-10.6-7-17-7H372c27.6-35.3 44-79.7 44-128C416 93.1 322.9 0 208 0S0 93.1 0 208s93.1 208 208 208c48.3 0 92.7-16.4 128-44v16.3c0 6.4 2.5 12.5 7 17l99.7 99.7c9.4 9.4 24.6 9.4 33.9 0l28.3-28.3c9.4-9.4 9.4-24.6.1-34zM208 336c-70.7 0-128-57.2-128-128 0-70.7 57.2-128 128-128 70.7 0 128 57.2 128 128 0 70.7-57.2 128-128 128z">
      </path>
    </svg>
  </span>
</section>
{{-- END: search --}}
{{-- START: TABLE --}}
<section class="mx-3 mr-5 mt-5">
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
              <form action="/dashboard/delete/{{ $room->id }}" method="POST" class="inline">
                @csrf
                @method('delete')
                <button type="submit" 
                  class="bg-pink-400 px-3 rounded-sm text-2xl focus:outline-none" onclick="return confirm('are you sure you delete {{ $room->name_product }}?')">
                  &#128465;
                </button>
              </form>
              {{-- details --}}
              <a href="/dashboard/details/{{ $room->id }}" 
                class="bg-pink-400 px-3 rounded-sm text-2xl hover:bg-black hover:text-pink-400">&#8505;</a>
            </td>
            {{-- name product --}}
            <td class="border border-solid border-black">{{ $room->name_product }}</td>
            @php
              $category = explode('_', $room->category);
            @endphp
            {{-- category --}}
            <td class="border border-solid border-black">{{ ucfirst($category[0]) . ' ' . $category[1] }}</td>
            {{-- price --}}
            <td class="border border-solid border-black">IDR {{ number_format($room->price,0, ',', '.') }}</td>
            {{-- images --}}
            @php
              $images = [
                $room->image1,
                $room->image2,
                $room->image3
              ];
            @endphp
            @foreach($images as $image)
            <td class="border border-solid border-black">
              <img 
                src="{{ asset('images/upload_images/' . $image) }}" 
                alt="upload images"
                class="w-14 h-14"
              />
            </td>
            @endforeach
          </tr>
        @empty
          <tr>
            <td colspan="8">Data rooms not found</td>
          </tr>
        @endforelse
        
      </tbody>
    </table>
  </section>
  {{-- END: TABLE --}}
  
  @push('include-js')
    {{-- dashboard --}}
    <script src="{{ asset('js/dashboard.js') }}"></script>
  @endpush
@endsection