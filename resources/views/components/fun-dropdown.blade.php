{{-- @dd($options) --}}
{{-- <select name="{{ $name }}"
    class="w-full rounded-md border-0 py-1.5 px-2.5 text-sm ring-1 ring-orange-300 placeholder:text-slate-400 focus:ring-2">
    <option value="">Choose {{ Str::ucfirst($mType) }}</option>
    @foreach ($options as $option)
        <option value="{{ $option['id'] }}" {{ $option['id'] == $selected ? 'selected' : '' }}>
            {{ $option['details'] }}
        </option>
    @endforeach
</select> --}}


{{-- @foreach ($options as $option)
<label for="{{ $name }}" class="mb-1 flex items-center">
    <input type="radio" name="{{ $name }}" value="{{ $option->id }}" @checked($option === request($name)) />
    <span class="ml-2">{{ $option->details }}</span>
</label>
@endforeach --}}

<select name="{{ $name }}"
{{ $attributes->merge(['class' => 'w-full rounded-md border-1 border-orange-300 py-1.5 px-2.5 text-sm placeholder:text-slate-400 focus:ring-2']) }}>
    <option value="">Choose {{ Str::ucfirst($mType) }}</option>
    @foreach ($options as $option)
        <option value="{{ $option['id'] }}" {{ $option['id'] == $selected ? 'selected' : '' }}>
            {{ $option['details'] }}
        </option>
    @endforeach
</select>
