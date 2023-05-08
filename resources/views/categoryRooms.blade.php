@extends('layouts.struktur-html')
@section('title', 'Luxspace ~ Saingan IKEA')
@push('include-css')
    <link rel="stylesheet" href="{{ asset('css/app.css') }}" />
@endpush

@section('content')
    @include('layouts.header')

    <div class="flex flex-wrap justify-center" id="category-room">
        @foreach ($category as $room)
            <!-- START: item carousel -->
            <div class="p-4 relative card mt-12">
                <div class="rounded-xl overflow-hidden card-shadow relative sm:w-72 sm:h-96 w-48 h-80">
                    <img src="{{ asset('images/upload_images/' . $room->image1) }}" alt="just arrived"
                        class="w-full h-full object-cover object-center show-icon-details" />
                    {{-- START: icon details (mata) --}}
                    <a href="/details/{{ $room->id }}"
                        class="stretched-link rounded-xl hidden items-center justify-center"
                        style="background-color: rgba(36, 47, 49, 0.35);">
                        <div class="icon-details">
                            <img src="{{ asset('images/design/icon-details.svg') }}" alt="icon details">
                        </div>
                    </a>
                    {{-- END: icon details (mata) --}}
                </div>
                <h5 class="text-lg font-semibold mt-4">{{ $room->name_product }}</h5>
                <span>IDR {{ number_format($room->price, 0, ',', '.') }}</span>
            </div>
            <!-- END: item carousel  -->
        @endforeach
    </div>

    @php
        $jumlahHalaman = ceil($category->total() / $category->perPage());
        $halamanAktif = isset($_GET['page']) ? $_GET['page'] : 1;
        $uri = explode('/', $_SERVER['REQUEST_URI']);
        $uriCategory = end($uri);
    @endphp
    <div class="text-center mt-20" id="pagination">
        <span class="relative z-0 inline-flex shadow-sm rounded-md">
            @for ($i = 1; $i <= $jumlahHalaman; $i++)
                @if ($i == $halamanAktif)
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
        {{-- icon keranjang --}}
        <script src="{{ asset('js/iconKeranjang.js') }}"></script>
        {{-- menu toggler --}}
        <script src="{{ asset('js/menu-toggler.js') }}"></script>
        {{-- slider --}}
        <script src="{{ asset('js/categoryRooms.js') }}"></script>
        {{-- accourdion khusus pengguna handphone --}}
        <script src="{{ asset('js/accourdion.js') }}"></script>
    @endpush

@endsection
