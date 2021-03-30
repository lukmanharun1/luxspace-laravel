@extends('layouts.struktur-html')
@section('title', 'Shipping Details')
@push('include-css')
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&display=swap">
<style>
  body {
    font-family: 'Open Sans', sans-serif;
  }
  table tbody tr td.pay-now a {
    text-decoration: none;
    background-color: #F9CADA; 
    color: black; 
    border-radius: 999px;
    text-align: center;
    padding-top: 10px;
    padding-bottom: 10px;
    display: block;
  }
  table tbody tr td.pay-now a:hover {
    color: #F9CADA;
    background-color: black;
  }

  /* responsive untuk tablet & handphone */
  @media (max-width: 768px) {
    .shipping-details, .shopping-cart {
      font-size: 1rem !important;
    }
    table tbody tr td.pay-now a  {
      padding-top: 0.75rem;
      padding-bottom: 0.75rem;
    }
    
  }
  .total td {
    border-top: 1px solid black;
  }
</style>
@endpush

@section('content')
  {{-- START: header --}}
  <header style="text-align: center">
    <img
      src="{{ asset('images/design/logo.svg') }}"
      alt="Luxspace ~ Adalah sebuah website yang menjual barang-barang kece"
    />
  </header>
  {{-- END: header --}}

  {{-- START: Shipping Details --}}
  <section style="text-align: center">
    <h3 style="font-size: 1.5rem">Shipping Details</h3>
  </section>
  <table class="shipping-details" style="font-size: 1.125rem; margin: 0 auto;" cellpadding="5" cellspacing="4">
    <tbody>
      {{-- your name --}}
      <tr>
        <td>
          Your name
        </td>
        <td>
          <b>
            Lukman
            </b>
        </td>
      </tr>
      {{-- your email --}}
      <tr>
        <td>
           Your email
        </td>
        <td>
          <b>
            nandes88.ni@gmail.com
          </b>
        </td>
      </tr>
      {{-- address --}}
      <tr>
        <td>
           Address
        </td>
        <td style="width: calc(20vw + 100px);">
          <b>
            Jalan hoscokroaminoto no 16 Jalan hoscokroaminoto no 16 Jalan hoscokroaminoto no 16 
          </b>
        </td>
      </tr>
      {{-- Phone number --}}
      <tr>
        <td>
          Phone number
        </td>
        <td>
          <b>
            8953232432432423
          </b>
        </td>
      </tr>
      {{-- Courier --}}
      <tr>
        <td>
          Courier
        </td>
        <td>
          {{-- <b>
            fedex
          </b> --}}
          <img src="{{ asset('images/content/courier/logo-fedex.png') }}" alt="" style="max-width: 117px; max-height: 50px;">
        </td>
      </tr>
      {{-- Payment --}}
      <tr>
        <td>
          Payment
        </td>
        <td>
          {{-- <b>
            midtrans
          </b> --}}
          <img src="{{ asset('images/content/payment/logo-midtrans.png') }}" alt="" style="max-width: 117px; max-height: 50px;">
        </td>
      </tr>
    </tbody>
   </table>
  {{-- END: Shipping Details --}}

  {{-- START: shopping cart --}}
  <section style="text-align: center; margin-bottom: 0.75rem;">
    <h3 style="font-size: 1.5rem">Shopping Cart</h3>
  </section>
  <table style="font-size: 1.25rem; margin: 0 auto;" cellpadding="8" cellspacing="0" class="shopping-cart">
    <thead align="center">
      <tr>
        <td>Photo</td>
        <td>Name product</td>
        <td>Price</td>
      </tr>
    </thead>
    <tbody>
      <tr align="center">
        <td>
          <img src="{{ asset('images/upload_images/alas-kursi1.jpg-6059f8eac6bd6.jpg') }}" alt="shopping cart" width="80" height="80" />
        </td>
        <td>
          <b>
            
            meja dan 4 kursi  meja dan 4 kursi
          </b>
        </td>
        <td>
         <b>
          IDR 200.000.000
         </b>
        </td>
      </tr>
      {{-- START: Total --}}
      <tr class="total"> 
        {{-- kosongkan bagian image --}}
        <td style="display: none"></td>
        <td align="center">
          <b>Total</b>
        </td>
        <td align="center">termasuk ppn 10%</td>
        <td align="center">
          <b>IDR 12.000.000.000.000</b>
        </td>
      </tr>
      <tr>
        <td></td>
        <td></td>
        <td class="pay-now">
          <a
            href="#">
            <b>
              Pay Now
            </b>
          </a>
        </td>
      </tr>
      {{-- END: Total --}}
    </tbody>
  </table>
  {{-- END: shopping cart --}}
  
@endsection