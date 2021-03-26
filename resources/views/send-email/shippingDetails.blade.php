@extends('layouts.struktur-html')
@section('title', 'Shipping Details')
@push('include-css')
  <link rel="stylesheet" href="{{ asset('css/app.css') }}" />
  <style>
    .grid.justify-center {
      grid-template-rows: 25px;
      grid-template-columns: 80px minmax(0, 250px) minmax(0, 350px);
    }
  </style>
@endpush

@section('content')
  {{-- START: header --}}
  <header class="flex justify-center items-center mt-3">
    <img
      src="{{ asset('images/design/logo.svg') }}"
      alt="Luxspace ~ Adalah sebuah website yang menjual barang-barang kece"
    />
  </header>
  {{-- END: header --}}

  {{-- START: Shipping Details --}}
  <section class="flex justify-center items-center mt-3">
    <h3 class="text-2xl">Shipping Details</h3>
  </section>
  <div class="grid md:mx-auto mt-3 w-1/3" style=" grid-template-columns: minmax(100px, 200px) minmax(100px, 450px); grid-template-rows: repeat(6, minmax(50px, 1fr))">
    <div class="text-lg md:justify-self-end">
     Your name
    </div>
    <b class="text-lg md:ml-5">lukman</b>
    <div class="text-lg md:justify-self-end">
      Email address
    </div>
    <b class="text-lg md:ml-5">
      lukman@gmail.com
    </b>

    <div class="text-lg md:justify-self-end">
     Address
    </div>
    <b class="text-lg md:ml-5">
      jalan hostcokroaminoto no.16
    </b>
    <div class="text-lg md:justify-self-end">
      Phone number
     </div>
     <b class="text-lg md:ml-5">
      8953232432432423
     </b>
     <div class="text-lg md:justify-self-end">
       Courier
     </div>
     <b class="text-lg md:ml-5">
      fedex
     </b>
     <div class="text-lg md:justify-self-end">
     Payment
    </div>
    <b class="text-lg md:ml-5">
     midtrans
    </b>
  </div>
  {{-- END: Shipping Details --}}

  {{-- START: shopping cart --}}
  <section class="flex justify-center items-center mb-3">
    <h3 class="text-2xl">Shopping Cart</h3>
  </section>
  <div class="grid justify-center">
    <p class="justify-self-center">Photo</p>
    <p class="justify-self-center">Name product</p>
    <p class="justify-self-center">Price</p>
    <img src="{{ asset('images/upload_images/alas-kursi1.jpg-6059f8eac6bd6.jpg') }}" alt="">
    <b class="text-xl place-self-center">meja dan 4 kursi</b>
    <b class="text-xl place-self-center">IDR 200.000.000</b>
    <img src="{{ asset('images/upload_images/alas-kursi1.jpg-6059f8eac6bd6.jpg') }}" alt="">
    <b class="text-xl place-self-center">meja dan 4 kursi</b>
    <b class="text-xl place-self-center">IDR 200.000.000</b>
    <div></div>
    <b class="text-xl justify-self-center">Total</b>
    <span class="text-xl justify-self-center">
      <b>IDR 12.000.000</b> 
      termasuk ppn 10%
      <a
      href="#"
      class="bg-pink-400 text-black hover:bg-black hover:text-pink-400 rounded-full px-12 py-3 inline-block"
    >
     Pay Now
    </a>
    </span>
  </div>
  {{-- END: shopping cart --}}

  {{-- START: pay now --}}
  <div class="flex justify-center items-center">
   
  </div>
  <br>
  {{-- END: pay now --}}
@endsection