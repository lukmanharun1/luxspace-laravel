@foreach ($category as $room)
    <!-- START: item carousel -->
    <div class="p-4 relative card mt-12">
        <div class="rounded-xl overflow-hidden card-shadow relative sm:w-72 sm:h-96 w-48 h-80">
            <img src="{{ asset('images/upload_images/' . $room->image1) }}" alt="just arrived"
                class="w-full h-full object-cover object-center show-icon-details" />
            {{-- START: icon details (mata) --}}
            <a href="/details/{{ $room->id }}" class="stretched-link rounded-xl hidden items-center justify-center"
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
