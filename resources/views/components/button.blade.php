<button {{ $attributes->merge(['type' => 'submit', 'class' => 'bg-pink-400 text-black hover:bg-black hover:text-pink-400 rounded-full px-8 py-3 inline-block flex-none transition duration-200 focus:outline-none font-semibold']) }}>
    {{ $slot }}
</button>