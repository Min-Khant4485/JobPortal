<a href="{{ $href }}"
    {{ $attributes->merge(['class' => 'rounded-md border border-slate-300 bg-indigo-400 px-2.5 py-1.5 text-center text-sm font-semibold text-black hover:bg-blue-500']) }}>
    {{ $slot }}


</a>

{{-- <button
    {{ $attributes->merge(['class' => 'rounded-md border border-slate-300 bg-orange-200 px-2.5 py-1.5 text-center text-sm font-semibold text-gray-700 hover:bg-orange-400']) }}>
    {{ $slot }}
</button> --}}
