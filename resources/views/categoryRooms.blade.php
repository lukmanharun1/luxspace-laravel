@extends('layouts.struktur-html')
@section('title', 'Luxspace ~ Saingan IKEA')
@push('include-css')
<link rel="stylesheet" href="{{ asset('css/app.css') }}" />
@endpush

@section('content')
@include('layouts.header')

 <div class="flex flex-wrap">
    @foreach($category as $room)
      <!-- START: item carousel -->
      <div class="p-4 relative card">
        <div
          class="rounded-xl overflow-hidden card-shadow relative"
          style="width: 287px; height: 386px">
          
          <img
            src="{{ asset('images/upload_images/' . $room->image1) }}"
            alt="just arrived"
            class="w-full h-full object-cover object-center"
          />

          {{-- START: icon details (mata) --}}
          <div class="absolute inset-0 rounded-3xl hidden" style="background-color: rgba(36, 47, 49, 0.35);">
            <div class="icon-details">
              <svg xmlns="http://www.w3.org/2000/svg">
                <path d="M41.6557 10.0065C39.2794 6.95958 36.2012 4.43931 32.7542 2.71834C29.2355 0.961548 25.4501 0.0500333 21.4985 0.00223289C21.3896 -0.000744296 20.9526 -0.000744296 20.8438 0.00223289C16.8923 0.050116 13.1068 0.961548 9.58807 2.71834C6.14106 4.43931 3.06307 6.9595 0.686613 10.0065C-0.228871 11.1802 -0.228871 12.8198 0.686613 13.9935C3.06299 17.0404 6.14106 19.5607 9.58807 21.2817C13.1068 23.0385 16.8922 23.95 20.8438 23.9978C20.9526 24.0007 21.3896 24.0007 21.4985 23.9978C25.45 23.9499 29.2355 23.0385 32.7542 21.2817C36.2012 19.5607 39.2793 17.0405 41.6557 13.9935C42.5712 12.8196 42.5712 11.1802 41.6557 10.0065ZM10.3576 19.7406C7.13892 18.1335 4.26445 15.7799 2.04487 12.9341C1.61591 12.3841 1.61591 11.6159 2.04487 11.0659C4.26436 8.22009 7.13883 5.86646 10.3576 4.25944C11.2717 3.80311 12.2053 3.40846 13.1561 3.07436C10.71 5.27317 9.16886 8.45975 9.16886 12C9.16886 15.5403 10.7101 18.7272 13.1564 20.9259C12.2056 20.5918 11.2718 20.197 10.3576 19.7406ZM21.1712 22.2798C15.5028 22.2798 10.8913 17.6683 10.8913 11.9999C10.8913 6.33148 15.5028 1.72007 21.1712 1.72007C26.8396 1.72007 31.4511 6.33156 31.4511 12C31.4511 17.6684 26.8396 22.2798 21.1712 22.2798ZM40.2976 12.9341C38.0781 15.7798 35.2036 18.1335 31.9849 19.7405C31.0718 20.1963 30.1388 20.5892 29.1892 20.923C31.6336 18.7243 33.1736 15.5387 33.1736 11.9999C33.1736 8.45918 31.6321 5.27218 29.1856 3.07336C30.1366 3.40755 31.0705 3.80269 31.9849 4.25928C35.2036 5.86629 38.0781 8.21993 40.2976 11.0657C40.7265 11.6158 40.7265 12.384 40.2976 12.9341Z" fill="black"/>
                <path d="M21.1712 7.60071C18.7454 7.60071 16.772 9.57417 16.772 11.9999C16.772 14.4257 18.7454 16.3991 21.1712 16.3991C23.5969 16.3991 25.5704 14.4257 25.5704 11.9999C25.5705 9.57417 23.597 7.60071 21.1712 7.60071ZM21.1712 14.6767C19.6952 14.6767 18.4944 13.476 18.4944 11.9999C18.4944 10.5239 19.6951 9.32318 21.1712 9.32318C22.6471 9.32318 23.8479 10.5239 23.8479 11.9999C23.848 13.476 22.6471 14.6767 21.1712 14.6767Z" fill="black" />
              </svg>
            </div>
          </div>
        </div>
        {{-- END: icon details (mata) --}}
        <h5 class="text-lg font-semibold mt-4">{{ $room->name_product }}</h5>
        <span>IDR {{ number_format($room->price,0, ',', '.') }}</span>
        <a href="/details/{{ $room->id }}" class="stretched-link">
          <!-- fake children -->
        </a>
      </div>
      <!-- END: item carousel  -->
    @endforeach
  </div>

  @php
    $jumlahHalaman = ceil($category->total() / $category->perPage());
    $halamanAktif = (isset($_GET['page'])) ? $_GET['page'] : 1;
    $uri = explode('/', $_SERVER['REQUEST_URI']); 
    $uriCategory = end($uri);
  @endphp
  <div class="text-center mt-3" id="pagination">
    <span class="relative z-0 inline-flex shadow-sm rounded-md">
      @for($i = 1; $i <= $jumlahHalaman; $i++)
        @if($i == $halamanAktif)
          <a href="{{ url("/pagination/$uriCategory?page=$i") }}" 
            class="relative inline-flex items-center px-4 py-2 -ml-px text-lg font-medium border text-pink-400 bg-black border-black hover:bg-black hover:text-pink-400 leading-5 focus:z-10">
          {{ $i }}
          </a>
          @else
            <a href="{{ url("/pagination/$uriCategory?page=$i") }}" 
              class="relative inline-flex items-center px-4 py-2 -ml-px text-lg font-medium border border-black hover:bg-black hover:text-pink-400 leading-5 focus:z-10">
            {{ $i }}
          </a>
        @endif
      @endfor
    </span>
  </div>
  
  @include('layouts.aside-menu')
  @include('layouts.footer')
  @push('include-js')
    {{-- utils class --}}
    <script src="{{ asset('js/utils-class.js') }}"></script>
    {{-- menu toggler --}}
    <script src="{{ asset('js/menu-toggler.js') }}"></script>
    {{-- slider --}}
    <script src="{{ asset('js/categoryRooms.js') }}"></script>
    {{-- accourdion khusus pengguna handphone --}}
    <script src="{{ asset('js/accourdion.js') }}"></script>
  @endpush

@endsection