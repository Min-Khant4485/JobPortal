{{-- <button
    {{ $attributes->class(['rounded-md border border-slate-300 bg-orange-200 px-2.5 py-1.5 text-center text-sm font-semibold text-black hover:bg-orange-400']) }}>
    {{ $slot }}
</button> --}}


<button
    {{ $attributes->merge(['class' => 'rounded-md border border-slate-300 bg-orange-100 px-2.5 py-1.5 text-center text-sm font-semibold text-gray-700 hover:bg-orange-400']) }}>
    {{ $slot }}
</button>
