{{-- <div class="relative w-full">
    @if ('textarea' != $type)
        <input {{ $attributes->merge([
                'class' => 'rounded-md border-1 border-orange-300 py-1.5 px-2.5 text-sm placeholder:text-slate-400 focus:ring-2 pr-8' . ($formRef ? ' pr-8' : '') . (!$errors->has($name) ? ' ring-slate-300' : ' ring-red-300')
            ]) }} x-ref="input-{{ $name }}" type="{{ $type }}"
            placeholder="{{ $placeholder }}" name="{{ $name }}" value="{{ old($name, $value) }}"
            id="{{ $name }}" />
    @else
        <textarea id="{{ $name }}" name="{{ $name }}" {{ $attributes->merge([
                'class' => 'rounded-md border-1 border-orange-300 py-1.5 px-2.5 text-sm placeholder:text-slate-400 focus:ring-2 pr-8' . ($formRef ? ' pr-8' : '') . (!$errors->has($name) ? ' ring-slate-300' : ' ring-red-300')
            ]) }}>{{ old($name, $value) }}</textarea>
    @endif
    @error($name)
        <div class="mt-1 text-xs text-red-500">
            {{ $message }}
        </div>
    @enderror
</div> --}}










<div class="relative w-full">
    @if ('textarea' != $type)
        <input {{ $attributes }} x-ref="input-{{ $name }}" type="{{ $type }}"
            placeholder="{{ $placeholder }}" name="{{ $name }}" value="{{ old($name, $value) }}"
            id="{{ $name }}" @class([
                'w-full rounded-md border-1 border-orange-300 py-1.5 px-2.5 text-sm placeholder:text-slate-400 focus:ring-2',
                'pr-8' => $formRef,
                'ring-slate-300' => !$errors->has($name),
                'ring-red-300' => $errors->has($name),
            ]) />
    @else
        <textarea id="{{ $name }}" name="{{ $name }}" @class([
            'w-full rounded-md border-1 border-orange-300 py-1.5 px-2.5 text-sm placeholder:text-slate-400 focus:ring-2',
            'pr-8' => $formRef,
            'ring-slate-300' => !$errors->has($name),
            'ring-red-300' => $errors->has($name),
        ])>{{ old($name, $value) }}</textarea>
    @endif
    @error($name)
        <div class="mt-1 text-xs text-red-500">
            {{ $message }}
        </div>
    @enderror
</div>
