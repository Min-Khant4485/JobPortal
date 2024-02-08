<div>
    @foreach ($options as $option)
        <label for="{{ $name }}" class="mb-1 inline-flex items-center justify-between">
            <input type="radio" name="{{ $name }}" value="{{ $option['id'] }}" 
                :checked="{{ $option === request($name) ? 'true' : 'false' }}"
                class="text-orange-400" />
            <span class="ml-2 justify-between">{{ $option['details'] }}</span>
        </label>
    @endforeach
</div>

{{-- <div>
    <x-label for="job_status" :required="true">Job Status</x-label>

    @foreach ($job_statuses as $status)
        <label for="job_status_{{ $status->id }}" class="mb-1 flex items-center">
            <input type="radio" name="job_status" id="job_status_{{ $status->id }}"
                value="{{ $status->id }}" {{ old('job_status', $defaultStatusId) == $status->id ? 'checked' : '' }} />
            <span class="ml-2">{{ $status->details }}</span>
        </label>
    @endforeach
</div> --}}



{{-- @foreach ($options as $option)
<option value="{{ $option['id'] }}" {{ $option['id'] == $selected ? 'selected' : '' }}>
    {{ $option['details'] }}
</option>
@endforeach --}}
