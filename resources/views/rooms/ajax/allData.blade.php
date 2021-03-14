@forelse($rooms as $i => $room)
<tr>
  <td class="border border-solid border-black">{{ ++$i }}</td>
  <td class="border border-solid border-black p-1">
    {{-- edit --}}
    <a href="/dashboard/edit/{{ $room->id }}" 
      class="bg-pink-400 px-3 rounded-sm text-2xl hover:bg-black hover:text-pink-400">&#9998;</a>
    {{-- hapus --}}
    <form action="/dashboard/delete/{{ $room->id }}" method="POST" class="inline">
      @csrf
      @method('delete')
      <button type="submit" 
        class="bg-pink-400 px-3 rounded-sm text-2xl focus:outline-none" onclick="return confirm('are you sure you delete {{ $room->name_product }}?')">
        &#128465;
      </button>
    </form>
    {{-- details --}}
    <a href="/dashboard/details/{{ $room->id }}" 
      class="bg-pink-400 px-3 rounded-sm text-2xl hover:bg-black hover:text-pink-400">&#8505;</a>
  </td>
  {{-- name product --}}
  <td class="border border-solid border-black">{{ $room->name_product }}</td>
  {{-- category --}}
  <td class="border border-solid border-black">{{ $room->category }}</td>
  {{-- price --}}
  <td class="border border-solid border-black">IDR {{ number_format($room->price,0, ',', '.') }}</td>
  {{-- image 1 --}}
  <td class="border border-solid border-black">
    <img 
      src="{{ asset('images/upload_images/' . $room->image1) }}" 
      alt="upload image 1"
      height="60"
      width="60"
    
    />
  </td>
  {{-- image 2 --}}
  <td class="border border-solid border-black">
    <img 
      src="{{ asset('images/upload_images/' . $room->image2) }}" 
      alt="upload image 2"
      height="60"
      width="60"
    />
  </td>
  {{-- image 3 --}}
  <td class="border border-solid border-black">
    <img 
      src="{{ asset('images/upload_images/' . $room->image3) }}" 
      alt="upload image 3"
      height="60"
      width="60"
    />
  </td>
</tr>
@empty
<tr>
  <td colspan="8">Data rooms not found</td>
</tr>
@endforelse