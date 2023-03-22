<button {{ $attributes->merge(['type' => 'button', 'class' => 'inline-flex items-center rounded-md bg-white px-3 py-2 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50 transition ease-in-out duration-300']) }}>
    {{ $slot }}
</button>
