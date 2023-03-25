<button {{ $attributes->merge(['type' => 'submit', 'class' => 'ring-1 ring-inset ring-transparent antialiased inline-flex justify-center rounded-md bg-blue-600 py-2 px-3 text-sm font-semibold text-white shadow-sm hover:bg-blue-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-blue-600 transition ease-in-out duration-150']) }}>
    {{ $slot }}
</button>
