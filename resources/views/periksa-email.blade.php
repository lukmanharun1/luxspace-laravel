@extends('layouts.struktur-html')
@section('title', 'Luxspace ~ Saingan IKEA')
@push('include-css')
<link rel="stylesheet" href="{{ asset('css/app.css') }}" />
@endpush
@section('content')
@include('layouts.header')
  <!-- START: BreadCrumb -->
  <section class="bg-gray-100 py-8 px-4">
    <div class="container mx-auto">
      <ul class="breadcrumb">
        <li>
          <a href="/">Home</a>
        </li>
        <li>
          <a href="#" aria-label="current-page">Shopping Cart</a>
        </li>
      </ul>
    </div>
  </section>
  <!-- END: BreadCrumb -->

  <!-- START: Congrats -->
  <!-- END: Congrats -->
  <section class="py-4 md:py-16">
    <div class="container mx-auto min-h-screen px-4">
      <div class="flex flex-col items-center justify-center">
        <div class="w-full md:w-4/12 text-center">
          <img
            src="./images/content/ilustration-success.png"
            alt="ilustration success"
          />
          <h2 class="text-3xl font-semibold mb-6">Ah yes it’s success!</h2>
          <p class="text-lg mb-12">
            Furniture yang anda beli akan kami kirimkan saat ini juga so now
            please sit tight and be ready for it
          </p>
          <a
            href="/"
            class="bg-pink-400 text-black hover:bg-black hover:text-pink-400 rounded-full px-8 py-3 inline-block transition duration-200"
            >Back to Shop</a
          >
        </div>
      </div>
    </div>
  </section>
  @include('layouts.aside-menu')
  @include('layouts.footer')
 @push('include-js')
  {{-- utils class --}}
  <script src="js/utils-class.js"></script>
  {{-- menu toggler --}}
  <script src="js/menu-toggler.js"></script>
  {{-- icon keranjang --}}
  <script src="{{ asset('js/iconKeranjang.js') }}"></script>
  {{-- accourdion khusus pengguna handphone --}}
  <script src="js/accourdion.js"></script>
 @endpush
@endsection