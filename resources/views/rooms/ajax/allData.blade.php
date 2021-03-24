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
  @php
    $category = explode('_', $room->category);
  @endphp
  {{-- category --}}
  <td class="border border-solid border-black">{{ ucfirst($category[0]) . ' ' . $category[1] }}</td>
  {{-- price --}}
  <td class="border border-solid border-black">IDR {{ number_format($room->price,0, ',', '.') }}</td>
  {{-- images --}}
  @php
    $images = [
      $room->image1,
      $room->image2,
      $room->image3
    ];
  @endphp
  @foreach($images as $image)
  <td class="border border-solid border-black">
    <img 
      src="{{ asset('images/upload_images/' . $image) }}" 
      alt="upload images"
      class="w-14 h-14"
    />
  </td>
  @endforeach
</tr>
@empty
<tr>
  <td colspan="8">Data rooms not found</td>
</tr>
@endforelse