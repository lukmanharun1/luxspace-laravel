@extends('layouts.struktur-html')
@section('title', 'Luxspace ~ Saingan IKEA')
@push('include-css')
{{-- using tailwindcss --}}
  <link rel="stylesheet" href="{{ asset('css/app.css') }}" />
  
@endpush
@section('content')
    <div class="flex justify-center items-center flex-col">
        <img
            src="images/design/logo.svg"
            alt="Luxspace ~ Adalah sebuah website yang menjual barang-barang kece"
            class="mt-6"
          />
        <img src="{{ asset('images/content/404_illustration.png') }}" alt="404 illustration ~ Luxspace" />
        <h3 class="text-2xl md:text-3xl mt-10" style="color: #1F2B4A;">Opps! What's This?</h3>
        <p class="md:text-xl text-lg mt-4 text-center" style="color: #828282;">
            Don’t panic and put yourself <br> 
            together because this page means <br> 
            doesn’t exist anymore
        </p>
        <a href="/" class="bg-pink-400 text-black hover:bg-black hover:text-pink-400 rounded-full px-8 py-3 inline-block flex-none transition duration-200 mt-7">Back To Home</a>
    </div>
@endsection