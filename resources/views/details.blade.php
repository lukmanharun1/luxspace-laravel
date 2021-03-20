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
          <a href="#">Office Room</a>
        </li>
        <li>
          <a href="#" aria-label="current-page">Details</a>
        </li>
      </ul>
    </div>
  </section>
  <!-- END: BreadCrumb -->

  <!-- START: Details -->
  <section class="container mx-auto">
    <div class="flex flex-wrap my-4 md:my-12">
      <div class="w-full md:hidden px-4">
        <h2 class="text-5xl font-semibold  mb-3">{{ $details->name_product }}</h2>
        <span class="text-xl">IDR {{ number_format($details->price,0, ',', '.') }}</span>
      </div>
      <div class="flex-1">
        <div class="slider">
          <div class="thumbnail">
            <!-- START: slideshow thumbnail item 1 -->
            <div class="px-2">
              <div
                class="item selected"
                data-img="{{ asset('images/upload_images/'. $details->image1) }}"
              >
                <img
                  src="{{ asset('images/upload_images/'. $details->image1) }}"
                  alt="{{ $details->name_product }}"
                  class="object-cover w-full h-full rounded-lg"
                />
              </div>
            </div>
            <!-- END: slideshow thumbnail item 1 -->

            <!-- START: slideshow thumbnail item 2 -->
            <div class="px-2">
              <div class="item" data-img="{{ asset('images/upload_images/'. $details->image2) }}">
                <img
                  src="{{ asset('images/upload_images/'. $details->image2) }}"
                  alt="{{ $details->name_product }}"
                  class="object-cover w-full h-full rounded-lg"
                />
              </div>
            </div>
            <!-- END: slideshow thumbnail item 2 -->

            <!-- START: slideshow thumbnail item 3 -->
            <div class="px-2">
              <div class="item" data-img="{{ asset('images/upload_images/'. $details->image3) }}">
                <img
                  src="{{ asset('images/upload_images/'. $details->image3) }}"
                  alt="{{ $details->name_product }}"
                  class="object-cover w-full h-full rounded-lg"
                />
              </div>
            </div>
            <!-- END: slideshow thumbnail item 3 -->

            <!-- START: slideshow thumbnail item 4 -->
            @if($details->image4)
              <div class="px-2">
                <div class="item" data-img="{{ asset('images/upload_images/'. $details->image4) }}">
                  <img
                    src="{{ asset('images/upload_images/'. $details->image4) }}"
                    class="object-cover w-full h-full rounded-lg"
                  />
                </div>
              </div>
              <!-- END: slideshow thumbnail item 4 -->
            @endif

            <!-- START: slideshow thumbnail item 5 -->
            @if ($details->image5)
              <div class="px-2">
                <div class="item" data-img="{{ asset('images/upload_images/'. $details->image5) }}">
                  <img
                    src="{{ asset('images/upload_images/'. $details->image5) }}"
                    class="object-cover w-full h-full rounded-lg"
                  />
                </div>
              </div>
              <!-- END: slideshow thumbnail item 5 -->
            @endif
          </div>
          <div class="preview">
            <div class="item rounded-lg h-full overflow-hidden">
              <img
                src="{{ asset('images/upload_images/'. $details->image1) }}"
                class="object-cover w-full h-full"
              />
            </div>
          </div>
        </div>
      </div>
      <div class="flex-1 px-4 md:p-6">
        <div class="hidden md:block">
          <h2 class="text-5xl font-semibold">{{ $details->name_product }}</h2>
          <p class="text-xl mt-3">IDR {{ number_format($details->price,0, ',', '.') }}</p>
        </div>
        <a
          href="/add-to-cart/{{ $details->id }}"
          class="transition-all duration-200 bg-pink-400 text-black focus:bg-black focus:text-pink-400 rounded-full px-8 py-3 mt-4 inline-flex md:w-auto w-full justify-center"
          ><svg
            class="fill-current mr-3"
            width="26"
            height="25"
            viewBox="0 0 26 25"
            fill="none"
            xmlns="http://www.w3.org/2000/svg"
          >
            <path
              d="M10.8754 19.9824C9.61762 19.9824 8.59436 21.023 8.59436 22.3021C8.59436 23.5812 9.61762 24.6218 10.8754 24.6218C12.1331 24.6218 13.1564 23.5812 13.1564 22.3021C13.1563 21.023 12.1331 19.9824 10.8754 19.9824ZM10.8754 23.3265C10.3199 23.3265 9.86796 22.8669 9.86796 22.302C9.86796 21.7371 10.3199 21.2775 10.8754 21.2775C11.4308 21.2775 11.8828 21.7371 11.8828 22.302C11.8828 22.867 11.4308 23.3265 10.8754 23.3265Z"
            />
            <path
              d="M18.8764 19.9824C17.6186 19.9824 16.5953 21.023 16.5953 22.3021C16.5953 23.5812 17.6186 24.6218 18.8764 24.6218C20.1342 24.6218 21.1575 23.5812 21.1575 22.3021C21.1574 21.023 20.1341 19.9824 18.8764 19.9824ZM18.8764 23.3265C18.3209 23.3265 17.869 22.8669 17.869 22.302C17.869 21.7371 18.3209 21.2775 18.8764 21.2775C19.4319 21.2775 19.8838 21.7371 19.8838 22.302C19.8838 22.867 19.4319 23.3265 18.8764 23.3265Z"
            />
            <path
              d="M19.438 7.76929H10.3122C9.96051 7.76929 9.67542 8.05921 9.67542 8.41689C9.67542 8.77456 9.96056 9.06448 10.3122 9.06448H19.438C19.7897 9.06448 20.0748 8.77456 20.0748 8.41689C20.0748 8.05916 19.7897 7.76929 19.438 7.76929Z"
            />
            <path
              d="M18.9414 11.1323H10.8089C10.4572 11.1323 10.1721 11.4223 10.1721 11.7799C10.1721 12.1376 10.4572 12.4275 10.8089 12.4275H18.9413C19.293 12.4275 19.5781 12.1376 19.5781 11.7799C19.5781 11.4223 19.293 11.1323 18.9414 11.1323Z"
            />
            <path
              d="M25.6499 4.88395C25.407 4.58083 25.0472 4.40701 24.6626 4.40701H4.82655L4.42595 2.42938C4.34232 2.01685 4.06563 1.67046 3.68565 1.50267L0.890528 0.268871C0.567841 0.126328 0.192825 0.276908 0.0528584 0.604959C-0.0872597 0.933113 0.0608116 1.31453 0.383347 1.45687L3.17852 2.69072L6.2598 17.9013C6.38117 18.5003 6.90578 18.9351 7.50723 18.9351H22.7635C23.1152 18.9351 23.4003 18.6451 23.4003 18.2875C23.4003 17.9298 23.1152 17.6399 22.7635 17.6399H7.50728L7.13247 15.7896H22.8814C23.4828 15.7896 24.0075 15.3548 24.1288 14.7558L25.9101 5.9634C25.9876 5.58054 25.8928 5.18701 25.6499 4.88395ZM22.8814 14.4945H6.87012L5.08895 5.70217L24.6626 5.70222L22.8814 14.4945Z"
            />
          </svg>
          Add to Cart
        </a>

        <hr class="my-8" />
        <h6 class="text-xl font-semibold">About the product:</h6>
        <p class="text-xl leading-7 mb-6">
          {{ $details->about_product }}
        </p>

        
      </div>
    </div>
  </section>
  <!-- END: Details -->

  <!-- START: complete your room -->
  <section class="bg-gray-100 px-4 py-16">
    <div class="container mx-auto">
      <div class="flex flex-start mb-4">
        <h3 class="text-2xl capitalize font-semibold">
          complete your room <br />
          with what we designed
        </h3>
      </div>
      <div class="flex flex-wrap overflow-x-auto mb-4 -mx-3">
        <!-- START: item  -->
        @foreach($all_room as $room)
          <div class="px-3 flex-none w-full md:w-3/12 mb-4">
            <a href="{{ url('details/' . $room->id) }}">
              <div class="rounded-xl p-4 relative bg-white">
                <div class="rounded-xl overflow-hidden card-shadow w-full h-48">
                  <img
                  src="{{ asset('images/upload_images/' . $room->image1) }}"
                  alt="chair 1"
                  class="w-full object-cover object-center"
                  />
                </div>
                <h5 class="text-lg font-semibold mt-4">{{ $room->name_product }}</h5>
                <span>IDR {{ number_format($room->price,0, ',', '.') }}</span>
                <a href="/details" class="streched-link">
                  <!-- fake children -->
                </a>
              </div>
            </a>
          </div>
        @endforeach
        <!-- END: item  -->

       

      </div>
    </div>
  </section>
  <!-- END: complete your room -->

@include('layouts.aside-menu')
@include('layouts.footer')
@push('include-js')
  {{-- utils class --}}
  <script src="{{ asset('js/utils-class.js') }}"></script>
  {{-- menu toggler --}}
  <script src="{{ asset('js/menu-toggler.js') }}"></script>
  {{-- slider --}}
  <script src="{{ asset('js/slider.js') }}"></script>
  {{-- accourdion khusus pengguna handphone --}}
  <script src="{{ asset('js/accourdion.js') }}"></script>
@endpush

@endsection
