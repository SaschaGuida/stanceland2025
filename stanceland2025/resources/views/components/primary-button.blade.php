<button {{ $attributes->merge(['type' => 'submit', 'class' => 'bg-buttoncolor text-fontcolor border border-buttoncolor hover:bg-background hover:text-fontcolor focus:outline-none rounded-lg text-sm px-4 py-2 transition-colors']) }}>
    {{ $slot }}
</button>
