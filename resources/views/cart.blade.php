@extends('layouts.struktur-html')
@section('title', 'Luxspace ~ Saingan IKEA')
@push('include-css')
<link rel="stylesheet" href="{{ asset('css/app.css') }}" />
<style>
  form input[type='radio']:checked ~ button {
    border-color: rgb(254, 202, 202);
  }
</style>
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

  <!-- START: cart -->
  <section class="md:py-16">
    <div class="container mx-auto px-4">
      <div class="flex -mx-4 flex-wrap">
        <!-- START: shipping cart -->
        <div class="w-full px-4 mb-4 md:w-8/12 md:mb-0" id="shopping-cart">
          <div
            class="flex flex-start mb-4 mt-8 pb-3 border-b border-gray-200 md:border-b-0"
          >
            <h3 class="text-2xl">Shopping Cart</h3>
          </div>
          <!-- START: Table Title -->
          <div class="border-b border-gray-200 mb-4 hidden md:block">
            <div class="flex flex-start items-center pb-2 -mx-4">
              <div class="px-4 flex-none">
                <div style="width: 90px">
                  <h6>Photo</h6>
                </div>
              </div>
              <div class="px-4 w-5/12">
                <div>
                  <h6>Product</h6>
                </div>
              </div>
              <div class="px-4 w-5/12">
                <div>
                  <h6>Price</h6>
                </div>
              </div>
              <div class="px-4 w-2/12">
                <div class="text-center">
                  <h6>Action</h6>
                </div>
              </div>
            </div>
          </div>
          <!-- END: Table Title -->

          
          
          <!-- START: Table item  -->
          @foreach($shopping_cart as $cart)
            <div
            class="flex flex-start flex-wrap items-center mb-4 -mx-4"
              data-row="{{ $cart['id'] }}"
              >
              <div class="px-4 flex-none">
                <div style="width: 90px; height: 90px">
                  <img
                    src="./images/upload_images/{{ $cart['image1'] }}"
                    alt="chair office 1"
                    class="object-cover rounded-xl w-full h-full"
                  />
                </div>
              </div>
              <div class="px-4 w-auto md:w-5/12 flex-1">
                <div>
                  <h6 class="font-semibold text-lg md:text-xl leading-8">
                  {{ $cart['name_product'] }}
                  </h6>
                  @php
                      $category = explode('_', $cart['category']);
                  @endphp
                  <span class="text-sm md:text-lg">{{ ucfirst($category[0]) . ' ' . ucfirst($category[1]) }}</span>
                  <h6
                    class="font-semibold text-base md:text-lg block md:hidden"
                    data-price="{{ $cart['price'] }}">
                    IDR {{ number_format($cart['price'],0, ',', '.') }}
                  </h6>
                </div>
              </div>
              <div class="px-4 w-auto md:w-5/12 md:flex-1 hidden md:block">
                <div>
                  <h6 class="font-semibold text-lg" 
                    data-price="{{ $cart['price'] }}">IDR {{ number_format($cart['price'],0, ',', '.') }}</h6>
                </div>
              </div>

              <div class="px-4 w-2/12">
                <div class="text-center">
                  <button
                    data-delete-item="{{ $cart['id'] }}"
                    class="text-red-600 border-none focus:outline-none px-3 py-1"
                  >
                    X
                  </button>
                </div>
              </div>
            </div>
          @endforeach

          <!-- START: Cart empty wrapper -->
          <p id="cart-empty" class="hidden text-center py-8">
            Ooops... Cart is empty
            <a href="/#browse-the-room" class="underline">Shop Now!</a>
          </p>
          <!-- END: Cart empty wrapper -->

          <!-- END: Table item  -->
          
          {{-- START: total --}}
          @if (count($shopping_cart) != 0)
            <div class="px-4 w-auto md:w-full mx-auto total">
              <div>
                <h6
                  class="text-base md:text-lg block md:hidden ml-12"
                >
                Total: <b>IDR {{ number_format($total + $total / 10,0, ',', '.') }}</b>
                sudah termasuk ppn 10%
                </h6>
              </div>
            </div>
            <div class="px-4 w-auto md:w-full md:flex-1 hidden md:block md:text-center ml-36 total">
              <div>
                <h6 class="text-lg">
                  Total: <b>IDR {{ number_format($total + $total / 10,0, ',', '.') }}</b>
                  sudah termasuk ppn 10%
                </h6>
              </div>
            </div>
          @endif

          {{-- END: total --}}
        </div>
        <!-- END: shipping cart -->


        <!-- START: shipping details -->
        <div class="w-full md:px-4 md:w-4/12" id="shipping-detail">
          <div class="bg-gray-100 px-4 py-6 md:p-8 md:rounded-3xl">
            <form action="" method="POST">
              @csrf
              <div class="flex flex-start mb-6">
                <h3 class="text-2xl">Shipping Details</h3>
              </div>
              <!-- START: input complete name -->
              <div class="flex flex-col mb-4">
                <label for="complete-name" class="text-sm"
                  >Complete Name</label
                >
                <input
                  name="name"
                  type="text"
                  id="complete-name"
                  required
                  class="border border-gray-200 rounded-lg px-4 py-2 bg-white text-sm focus:border-blue-200 focus:outline-none"
                  placeholder="Input your name"
                  value="{{ old('name') }}"
                />
                @error('name')
                  <b class="text-red-500 text-sm">{{ $message }}</b>
                @enderror
              </div>
              <!-- END: input complete name -->

              <!-- START: email address -->
              <div class="flex flex-col mb-4">
                <label for="email-address" class="text-sm"
                  >Email address</label
                >
                <input
                  name="email_address"
                  required
                  type="email"
                  value="{{ old('email_address') }}"
                  id="email-address"
                  class="border border-gray-200 rounded-lg px-4 py-2 bg-white text-sm focus:border-blue-200 focus:outline-none"
                  placeholder="Input your email address"
                />
                @error('email_address')
                  <b class="text-red-500 text-sm">{{ $message }}</b>
                @enderror
              </div>
              <!-- END: email address -->

              <!-- START: address -->
              <div class="flex flex-col mb-4">
                <label for="address" class="text-sm">Address</label>
                <input
                  required
                  name="address"
                  type="text"
                  value="{{ old('address') }}"
                  id="address"
                  class="border border-gray-200 rounded-lg px-4 py-2 bg-white text-sm focus:border-blue-200 focus:outline-none"
                  placeholder="Input your address"
                />
                @error('address')
                  <b class="text-red-500 text-sm">{{ $message }}</b>
                @enderror
              </div>
              <!-- END: address -->

              <!-- START: Phone Number -->
              <div class="flex flex-col mb-4">
                <label for="phone-number" class="text-sm">Phone Number</label>
                <input
                  required
                  name="phone_number"
                  type="tel"
                  value="{{ old('phone_number') }}"
                  id="phone-number"
                  class="border border-gray-200 rounded-lg px-4 py-2 bg-white text-sm focus:border-blue-200 focus:outline-none"
                  placeholder="Input your phone number"
                />
                @error('phone_number')
                  <b class="text-red-500 text-sm">{{ $message }}</b>
                @enderror
              </div>
              <!-- END: Phone Number -->

              <!-- START: Choose courier -->
              <div class="flex flex-col mb-4">
                <label class="text-sm mb-2">Choose courier</label>
                <div class="flex -mx-2 flex-wrap">
                  <!-- START: courier 1 -->
                  <div class="px-2 w-6/12 h-24 mb-4">
                    <input type="radio" class="hidden" name="courier" value="fedex" />
                    <button
                      type="button"
                      class="border-2 border-gray-200 focus:outline-none flex items-center justify-center rounded-xl bg-white w-full h-full"
                    >
                      <img
                        src="./images/content/courier/logo-fedex.png"
                        alt="fedex"
                        class="object-contain max-h-full"
                      />
                    </button>
                  </div>
                  <!-- END: courier 1 -->

                  <!-- START: courier 2 -->
                  <div class="px-2 w-6/12 h-24 mb-4">
                    <input type="radio" class="hidden" name="courier" value="dhl" />
                    <button
                      type="button"
                      class="border-2 border-gray-200 focus:outline-none flex items-center justify-center rounded-xl bg-white w-full h-full"
                    >
                      <img
                        src="./images/content/courier/logo-dhl.png"
                        alt="dhl"
                        class="object-contain max-h-full"
                      />
                    </button>
                  </div>
                  <!-- END: courier 2 -->
                </div>
                @error('courier')
                  <b class="text-red-500 text-sm">{{ $message }}</b>
                @enderror
              </div>
              <!-- END: Choose courier -->

              <!-- START: Choose Payment -->
              <div class="flex flex-col mb-4">
                <label class="text-sm mb-2">Choose Payment</label>
                <div class="flex -mx-2 flex-wrap">
                  <!-- START: payment 1 -->
                  <div class="px-2 w-6/12 h-24 mb-4">
                    <input type="radio" class="hidden" name="payment" value="midtrans" />
                    <button
                      type="button"
                      class="border-2 border-gray-200 focus:outline-none flex items-center justify-center rounded-xl bg-white w-full h-full"
                    >
                      <img
                        src="./images/content/payment/logo-midtrans.png"
                        alt="midtrans"
                        class="object-contain max-h-full"
                      />
                    </button>
                  </div>
                  <!-- END: payment 1 -->

                  <!-- START: payment 2 -->
                  <div class="px-2 w-6/12 h-24 mb-4">
                    <input type="radio" class="hidden" name="payment" value="mastercard" />
                    <button
                      type="button"
                      class="border-2 border-gray-200 focus:outline-none flex items-center justify-center rounded-xl bg-white w-full h-full"
                    >
                      <img
                        src="./images/content/payment/logo-mastercard.png"
                        alt="mastercard"
                        class="object-contain max-h-full"
                      />
                    </button>
                  </div>
                  <!-- END: payment 2 -->

                  <!-- START: payment 3 -->
                  <div class="px-2 w-6/12 h-24 mb-4">
                    <input type="radio" class="hidden" name="payment" value="bitcoin" />
                    <button
                      type="button"
                      class="border-2 border-gray-200 focus:outline-none flex items-center justify-center rounded-xl bg-white w-full h-full"
                    >
                      <img
                        src="./images/content/payment/logo-bitcoin.png"
                        alt="bitcoin"
                        class="object-contain max-h-full"
                      />
                    </button>
                  </div>
                  <!-- END: payment 3 -->

                  <!-- START: payment 4 -->
                  <div class="px-2 w-6/12 h-24 mb-4">
                    <input type="radio" class="hidden" name="payment" value="american_express" />
                    <button
                      type="button"
                      class="border-2 border-gray-200 focus:outline-none flex items-center justify-center rounded-xl bg-white w-full h-full"
                    >
                      <img
                        src="./images/content/payment/logo-american-express.png"
                        alt="american-express"
                        class="object-contain max-h-full"
                      />
                    </button>
                  </div>
                  <!-- END: payment 4 -->
                </div>
                @error('courier')
                  <b class="text-red-500 text-sm">{{ $message }}</b>
                @enderror
              </div>
              <!-- END: Choose Payment -->

              <div class="text-center">
                <button
                  type="submit"
                  class="bg-pink-400 text-black focus:bg-black focus:outline-none w-full py-3 rounded-full text-lg focus:text-pink-400 transition-all duration-200 px-6"
                >
                  Checkout Now
                </button>
              </div>
            </form>
          </div>
        </div>
        <!-- END: shipping details -->
      </div>
    </div>
  </section>

  <!-- END: cart -->


  @include('layouts.aside-menu')
  @include('layouts.footer')
  <!-- END: Footer -->

  @push('include-js')
    {{-- utils class --}}
    <script src="{{ asset('js/utils-class.js') }}"></script>
    {{-- menu toggler --}}
    <script src="{{ asset('js/menu-toggler.js') }}"></script>
    {{-- shipping & shopping --}}
    <script src="{{ asset('js/shippingDetail.js') }}"></script>
    <script src="{{ asset('js/shoppingCart.js') }}"></script>
    {{-- accourdion khusus pengguna handphone --}}
    <script src="{{ asset('js/accourdion.js') }}"></script>
  @endpush
@endsection
