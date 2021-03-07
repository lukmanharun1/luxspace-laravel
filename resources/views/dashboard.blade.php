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
 {{-- START: Notification --}}
  @if (session('status') && session('message'))
    <div class="notification" data-notification='
    <svg xmlns="http://www.w3.org/2000/svg" height="55" viewBox="0 0 24 24" width="55" class="text-pink-400">
      <path d="M0 0h24v24H0z" fill="none" />
      @if(session('status') === 'success')
        <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z" class="fill-current" />
      @elseif(session('status') === 'failed')
      <path d="M15.73 3H8.27L3 8.27v7.46L8.27 21h7.46L21 15.73V8.27L15.73 3zM17 15.74L15.74 17 12 13.26 8.26 17 7 15.74 10.74 12 7 8.26 8.26 7 12 10.74 15.74 7 17 8.26 13.26 12 17 15.74z" class="fill-current" />
      @endif
    </svg>
    <h2 class="text-3xl font-semibold">{{ session('status') }}</h2>
    <p>{{ session('message') }}</p>'></div>
  @endif
  
 {{-- END: Notification --}}
 
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
  
  @push('include-js')
    {{-- utils class --}}
    <script src="{{ asset('js/utils-class.js') }}"></script>
    {{-- notification pop up --}}
    <script src="{{ asset('js/notification.js') }}"></script>
  @endpush
@endsection