<select name="{{ $name }}"
    class="w-full rounded-md border-0 py-1.5 px-2.5 text-sm ring-1 ring-orange-300 placeholder:text-slate-400 focus:ring-2">
    <option value="">Choose {{ Str::ucfirst($mType) }}</option>
    @foreach ($options as $option)
        <option value="{{ $option['id'] }}" {{ $option['id'] == $selected ? 'selected' : '' }}>
            @if ($mType == 'country')
                {{ $option['country_name'] }}
            @elseif ($mType == 'city')
                {{ $option['city_name'] }}
            @elseif ($mType == 'industry')
                {{ $option['industry_name'] }}
            @elseif ($mType == 'skills_set')
                {{ $option['skill_name'] }}
            @elseif ($mType == 'skillCategory')
                {{ $option['category_name'] }}
            @endif
        </option>
    @endforeach
</select>
