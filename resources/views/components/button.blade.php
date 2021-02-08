<button {{ $attributes->merge(['type' => 'submit', 'class' => 'btn btn-gray']) }}>
    {{ $slot }}
</button>
