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
                        <img src="{{ asset('images/design/logo.svg') }}" alt="Luxspace ~ Saingan IKEA" />
                    </a>
                </div>
            </div>
            <h2 class="text-3xl text-center font-semibold -mt-8">Form Add data rooms</h2>
        </div>
    </header>
    <!-- END: Header -->

    {{-- START: form --}}
    <form action="" method="POST" enctype="multipart/form-data" class="py-6">
        @csrf
        <div class="w-3/12 mx-auto">
            {{-- name product --}}
            <label for="name-product" class="block mb-1">Name product
                <span class="text-red-500">*</span>
            </label>
            <input type="text" name="name_product"
                class="w-full rounded-lg px-4 py-2 bg-white text-sm focus:border-blue-200 focus:outline-none"
                id="name-product" value="{{ old('name_product') }}" required />
            @error('name_product')
                <span class="text-red-500 font-semibold">{{ $message }}</span>
            @enderror
            {{-- category --}}
            <label for="category" class="block my-1">Category
                <span class="text-red-500">*</span>
            </label>
            <select name="category" id="category"
                class="w-full rounded-lg px-4 py-2 bg-white text-sm focus:border-blue-200 focus:outline-none">
                <option value="all_room">All room</option>
                <option value="living_room">Living room</option>
                <option value="children_room">Children room</option>
                <option value="decoration_room">Decoration room</option>
                <option value="bed_room">Bed room</option>
            </select>
            @error('category')
                <span class="text-red-500 font-semibold">{{ $message }}</span>
            @enderror
            {{-- price --}}
            <label for="price" class="block my-1">Price
                <span class="text-red-500">*</span>
            </label>
            <div class="relative">
                <input type="number" name="price"
                    class="w-full rounded-lg px-4 py-2 pl-11 bg-white text-sm focus:border-blue-200 focus:outline-none"
                    id="price" required value="{{ old('price') }}" />
                <div class="absolute top-2 left-3">IDR</div>
            </div>
            @error('name_product')
                <span class="text-red-500 font-semibold">{{ $message }}</span>
            @enderror
            {{-- about product --}}
            <label for="about-product" class="block my-1">About product
                <span class="text-red-500">*</span>
            </label>
            <textarea name="about_product" id="about-product" cols="30" rows="4"
                class="w-full rounded-lg px-4 py-2 bg-white text-sm focus:border-blue-200 focus:outline-none" required>{{ old('about_product') }}</textarea>
            @error('about_product')
                <span class="text-red-500 font-semibold">{{ $message }}</span>
            @enderror
            {{-- upload image --}}
            <h3 class="text-center font-semibold text-lg mt-4">Upload image rooms</h3>
            {{-- image 1 --}}
            <label for="image1" class="block my-1">Image 1
                <span class="text-red-500">*</span>
            </label>
            <input type="file" name="image1"
                class="w-full rounded-lg px-4 py-2 bg-white text-sm focus:border-blue-200 focus:outline-none" id="image1"
                required />
            @error('image1')
                <span class="text-red-500 font-semibold">{{ $message }}</span>
            @enderror
            {{-- image 2 --}}
            <label for="image2" class="block my-1">Image 2
                <span class="text-red-500">*</span>
            </label>
            <input type="file" name="image2"
                class="w-full rounded-lg px-4 py-2 bg-white text-sm focus:border-blue-200 focus:outline-none" id="image2"
                required />
            @error('image2')
                <span class="text-red-500 font-semibold">{{ $message }}</span>
            @enderror
            {{-- image 3 --}}
            <label for="image3" class="block my-1">Image 3
                <span class="text-red-500">*</span>
            </label>
            <input type="file" name="image3"
                class="w-full rounded-lg px-4 py-2 bg-white text-sm focus:border-blue-200 focus:outline-none" id="image3"
                required />
            @error('image3')
                <span class="text-red-500 font-semibold">{{ $message }}</span>
            @enderror
            {{-- image 4 --}}
            <label for="image4" class="block my-1">Image 4
                <span class="text-gray-400">(opsional)</span>
            </label>
            <input type="file" name="image4"
                class="w-full rounded-lg px-4 py-2 bg-white text-sm focus:border-blue-200 focus:outline-none"
                id="image4" />
            {{-- image 5 --}}
            <label for="image5" class="block my-1">Image 5
                <span class="text-gray-400">(opsional)</span>
            </label>
            <input type="file" name="image5"
                class="w-full rounded-lg px-4 py-2 bg-white text-sm focus:border-blue-200 focus:outline-none"
                id="image5" />
            <button type="submit"
                class="bg-pink-400 text-black hover:bg-black hover:text-pink-400 focus:outline-none rounded-full px-8 py-3 w-full mt-5 transition duration-200">&plus;
                Add data rooms</button>
        </div>
    </form>
    {{-- END: form --}}
@endsection
