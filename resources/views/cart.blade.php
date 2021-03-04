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

          <!-- START: Cart empty wrapper -->
          <p id="cart-empty" class="hidden text-center py-8">
            Ooops... Cart is empty
            <a href="/details" class="underline">Shop Now!</a>
          </p>
          <!-- END: Cart empty wrapper -->

          <!-- START: Table item 1 -->
          <div
            class="flex flex-start flex-wrap items-center mb-4 -mx-4"
            data-row="1"
          >
            <div class="px-4 flex-none">
              <div style="width: 90px; height: 90px">
                <img
                  src="./images/content/chair-office-1.png"
                  alt="chair office 1"
                  class="object-cover rounded-xl w-full h-full"
                />
              </div>
            </div>
            <div class="px-4 w-auto md:w-5/12 flex-1">
              <div>
                <h6 class="font-semibold text-lg md:text-xl leading-8">
                  Saman Kakka
                </h6>
                <span class="text-sm md:text-lg">Office Room</span>
                <h6
                  class="font-semibold text-base md:text-lg block md:hidden"
                >
                  IDR 28.000.000
                </h6>
              </div>
            </div>
            <div class="px-4 w-auto md:w-5/12 md:flex-1 hidden md:block">
              <div>
                <h6 class="font-semibold text-lg">IDR 28.000.000</h6>
              </div>
            </div>

            <div class="px-4 w-2/12">
              <div class="text-center">
                <button
                  data-delete-item="1"
                  class="text-red-600 border-none focus:outline-none px-3 py-1"
                >
                  X
                </button>
              </div>
            </div>
          </div>
          <!-- END: Table item 1 -->

          <!-- START: Table item 2 -->
          <div
            class="flex flex-start flex-wrap items-center mb-4 -mx-4"
            data-row="2"
          >
            <div class="px-4 flex-none">
              <div style="width: 90px; height: 90px">
                <img
                  src="./images/content/chair-office-2.png"
                  alt="chair office 2"
                  class="object-cover rounded-xl w-full h-full"
                />
              </div>
            </div>
            <div class="px-4 w-auto md:w-5/12 flex-1">
              <div>
                <h6 class="font-semibold text-lg md:text-xl leading-8">
                  Green Seat
                </h6>
                <span class="text-sm md:text-lg">Office Room</span>
                <h6
                  class="font-semibold text-base md:text-lg block md:hidden"
                >
                  IDR 12.500.000
                </h6>
              </div>
            </div>
            <div class="px-4 w-auto md:w-5/12 md:flex-1 hidden md:block">
              <div>
                <h6 class="font-semibold text-lg">IDR 12.500.000</h6>
              </div>
            </div>

            <div class="px-4 w-2/12">
              <div class="text-center">
                <button
                  data-delete-item="2"
                  class="text-red-600 border-none focus:outline-none px-3 py-1"
                >
                  X
                </button>
              </div>
            </div>
          </div>
          <!-- END: Table item 2 -->

          <!-- START: Table item 3 -->
          <div
            class="flex flex-start flex-wrap items-center mb-4 -mx-4"
            data-row="3"
          >
            <div class="px-4 flex-none">
              <div style="width: 90px; height: 90px">
                <img
                  src="./images/content/chair-office-3.png"
                  alt="chair office 3"
                  class="object-cover rounded-xl w-full h-full"
                />
              </div>
            </div>
            <div class="px-4 w-auto md:w-5/12 flex-1">
              <div>
                <h6 class="font-semibold text-lg md:text-xl leading-8">
                  Pacific
                </h6>
                <span class="text-sm md:text-lg">Office Room</span>
                <h6
                  class="font-semibold text-base md:text-lg block md:hidden"
                >
                  IDR 88.800.000
                </h6>
              </div>
            </div>
            <div class="px-4 w-auto md:w-5/12 md:flex-1 hidden md:block">
              <div>
                <h6 class="font-semibold text-lg">IDR 88.800.000</h6>
              </div>
            </div>

            <div class="px-4 w-2/12">
              <div class="text-center">
                <button
                  data-delete-item="3"
                  class="text-red-600 border-none focus:outline-none px-3 py-1"
                >
                  X
                </button>
              </div>
            </div>
          </div>
          ,
          <!-- END: Table item 3 -->
        </div>
        <!-- END: shipping cart -->

        <!-- START: shipping details -->
        <div class="w-full md:px-4 md:w-4/12" id="shipping-detail">
          <div class="bg-gray-100 px-4 py-6 md:p-8 md:rounded-3xl">
            <form action="/success">
              <div class="flex flex-start mb-6">
                <h3 class="text-2xl">Shipping Details</h3>
              </div>
              <!-- START: input complete name -->
              <div class="flex flex-col mb-4">
                <label for="complete-name" class="text-sm"
                  >Complete Name</label
                >
                <input
                  data-input
                  type="text"
                  id="complete-name"
                  class="border border-gray-200 rounded-lg px-4 py-2 bg-white text-sm focus:border-blue-200 focus:outline-none"
                  placeholder="Input your name"
                />
              </div>
              <!-- END: input complete name -->

              <!-- START: email address -->
              <div class="flex flex-col mb-4">
                <label for="email-address" class="text-sm"
                  >Email address</label
                >
                <input
                  data-input
                  type="email"
                  id="email-address"
                  class="border border-gray-200 rounded-lg px-4 py-2 bg-white text-sm focus:border-blue-200 focus:outline-none"
                  placeholder="Input your email address"
                />
              </div>
              <!-- END: email address -->

              <!-- START: email address -->
              <div class="flex flex-col mb-4">
                <label for="address" class="text-sm">Address</label>
                <input
                  data-input
                  type="text"
                  id="address"
                  class="border border-gray-200 rounded-lg px-4 py-2 bg-white text-sm focus:border-blue-200 focus:outline-none"
                  placeholder="Input your address"
                />
              </div>
              <!-- END: email address -->

              <!-- START: Phone Number -->
              <div class="flex flex-col mb-4">
                <label for="phone-number" class="text-sm">Phone Number</label>
                <input
                  data-input
                  type="tel"
                  id="phone-number"
                  class="border border-gray-200 rounded-lg px-4 py-2 bg-white text-sm focus:border-blue-200 focus:outline-none"
                  placeholder="Input your phone number"
                />
              </div>
              <!-- END: Phone Number -->

              <!-- START: Choose courier -->
              <div class="flex flex-col mb-4">
                <label class="text-sm mb-2">Choose courier</label>
                <div class="flex -mx-2 flex-wrap">
                  <!-- START: courier 1 -->
                  <div class="px-2 w-6/12 h-24 mb-4">
                    <button
                      data-value="fedex"
                      data-name="courier"
                      type="button"
                      class="border border-gray-200 focus:outline-none focus:border-red-200 flex items-center justify-center rounded-xl bg-white w-full h-full"
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
                    <button
                      data-value="dhl"
                      data-name="courier"
                      type="button"
                      class="border border-gray-200 focus:outline-none focus:border-red-200 flex items-center justify-center rounded-xl bg-white w-full h-full"
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
              </div>
              <!-- END: Choose courier -->

              <!-- START: Choose Payment -->
              <div class="flex flex-col mb-4">
                <label class="text-sm mb-2">Choose Payment</label>
                <div class="flex -mx-2 flex-wrap">
                  <!-- START: payment 1 -->
                  <div class="px-2 w-6/12 h-24 mb-4">
                    <button
                      data-value="midtrans"
                      data-name="payment"
                      type="button"
                      class="border border-gray-200 focus:outline-none focus:border-red-200 flex items-center justify-center rounded-xl bg-white w-full h-full"
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
                    <button
                      data-value="mastercard"
                      data-name="payment"
                      type="button"
                      class="border border-gray-200 focus:outline-none focus:border-red-200 flex items-center justify-center rounded-xl bg-white w-full h-full"
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
                    <button
                      data-value="bitcoin"
                      data-name="payment"
                      type="button"
                      class="border border-gray-200 focus:outline-none focus:border-red-200 flex items-center justify-center rounded-xl bg-white w-full h-full"
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
                    <button
                      data-value="american-express"
                      data-name="payment"
                      type="button"
                      class="border border-gray-200 focus:outline-none focus:border-red-200 flex items-center justify-center rounded-xl bg-white w-full h-full"
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
              </div>
              <!-- END: Choose Payment -->

              <div class="text-center">
                <button
                  type="submit"
                  disabled
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
    <script src="js/utils-class.js"></script>
    {{-- menu toggler --}}
    <script src="js/menu-toggler.js"></script>
    {{-- shipping & shopping --}}
    <script src="js/shippingDetail.js"></script>
    <script src="js/shoppingCart.js"></script>
    {{-- accourdion khusus pengguna handphone --}}
    <script src="js/accourdion.js"></script>
  @endpush
@endsection
