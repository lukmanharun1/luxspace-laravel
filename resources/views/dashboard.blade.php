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
      <div class="absolute top-8 left-0 right-0 text-center notification" data-message="{{ session('message') }}">
        <h3 class="@if (session('message' === 'failed')) bg-red-500 @endif bg-pink-400 inline py-4 px-12 rounded"></h3>
      </div>
      @push('include-js')
        <script src="{{ asset('js/notification.js') }}"></script>
      @endpush
    @endif
    {{-- notification delete --}}
    <div class="delete" data-notification='
        <svg xmlns="http://www.w3.org/2000/svg" height="55" viewBox="0 0 24 24" width="55" class="text-pink-400">
          <path d="M0 0h24v24H0z" fill="none"/>
          <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm1 17h-2v-2h2v2zm2.07-7.75l-.9.92C13.45 12.9 13 13.5 13 15h-2v-.5c0-1.1.45-2.1 1.17-2.83l1.24-1.26c.37-.36.59-.86.59-1.41 0-1.1-.9-2-2-2s-2 .9-2 2H8c0-2.21 1.79-4 4-4s4 1.79 4 4c0 .88-.36 1.68-.93 2.25z" class="fill-current" />
        </svg>
        <h2 class="text-3xl font-semibold">Are you sure?</h2>
        <p>want to delete ${buttonDelete}?</p>'
        >  
        </div>
  
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
            {{-- category --}}
            <td class="border border-solid border-black">{{ $room->category }}</td>
            {{-- price --}}
            <td class="border border-solid border-black">IDR {{ number_format($room->price,0, ',', '.') }}</td>
            {{-- image 1 --}}
            <td class="border border-solid border-black">
              <img 
                src="{{ asset('images/upload_images/' . $room->image1) }}" 
                alt="upload image 1"
                height="60"
                width="60"
              
              />
            </td>
            {{-- image 2 --}}
            <td class="border border-solid border-black">
              <img 
                src="{{ asset('images/upload_images/' . $room->image2) }}" 
                alt="upload image 2"
                height="60"
                width="60"
              />
            </td>
            {{-- image 3 --}}
            <td class="border border-solid border-black">
              <img 
                src="{{ asset('images/upload_images/' . $room->image3) }}" 
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
    {{-- dashboard --}}
    <script src="{{ asset('js/dashboard.js') }}"></script>
  @endpush
@endsection