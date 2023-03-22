<button {{ $attributes->merge(['type' => 'button', 'class' => 'inline-flex justify-center rounded-md bg-red-600 py-2 px-3 text-sm font-semibold text-white shadow-sm hover:bg-red-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-red-600 transition ease-in-out duration-150']) }}>
    {{ $slot }}
</button>
