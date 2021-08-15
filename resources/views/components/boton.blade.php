<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center px-4 py-2 bg-white border-2 border-red-500 rounded-3xl font-bold text-sm text-red-600 uppercase hover:bg-red-600 hover:text-white']) }}>
    {{ $slot }}
</button>
