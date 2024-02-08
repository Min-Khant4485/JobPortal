<x-card class="mt-4 mb-2">
    <div class="mb-2 flex justify-between">
        <div class="w-full p-2 inline-flex justify-between items-center bg-orange-400 rounded-md">
            <h3 name="job_title" class="p-2 text-gray-50 font-semibold">{{ $jobpost->job_title }}</h3>
            <h3 name="currency" class="p-2 items-right text-gray-50 font-semibold">
                {{ App\Models\Common::find($jobpost->currency)->details }}</h3>
            <h3 name="salary" class="p-2 items-right text-gray-50 font-semibold">{{ $jobpost->salary }}</h3>
        </div>
    </div>

    <div class="">
        <div class="flex item-center justify-between">
            <div class=" flex items-center">
                {{-- @dd($jobpost->city) --}}
                {{-- @dd($jobpost) --}}
                {{-- <h3> {{ App\Models\Employer::where('id',$jobpost->employer_id)->company_name }}</h3> --}}
                <img src="https://cdn.pixabay.com/photo/2020/07/01/12/58/icon-5359554_640.png"
                    class=" p-2 w-[50px] h-[50x] rounded-full me-auto" />
                <p class=" pl-2 font-bold">{{ $jobpost->employer->company_name }}</p>
            </div>
            <div class="flex items-center justify-between">
                <box-icon name='map'></box-icon>
                <h4 class=" p-2 font-normal">{{ $jobpost->city->city_name }},
                    {{ $jobpost->city->country->country_name }}</h4>
            </div>
            @if ($jobpost->deleted_at)
                <span class="text-xs text-red-500">Delete</span>
            @endif
        </div>
        <div class=" flex items-center justify-left">
            <div class=" flex content-center">
                <div class=" ps-1 py-0.5 items-center"> <box-icon name='time-five'></box-icon></div>
                <div class=" ps-1 items-center">{{ $jobpost->created_at->diffForHumans() }}</div>
            </div>
        </div>
        <h3 class=" pl-2 pt-2 font-medium">Description</h3>

        <p class=" pl-2"> {{ $jobpost->description }}</p>

        <div class="pl-2 flex items-center justify-between card-foot">
            <h3> {{ App\Models\Common::find($jobpost->job_type)->details }}</h3>
            <h3 class=" pt-2">{{ $jobpost->details }}</h3>
            <h3> Deadline: {{ $jobpost->closing_date }}</h3>
        </div>
        <h3 class=" text-right"> Salary: {{ $jobpost->salary }}</h3>
    </div>

    {{ $slot }}

</x-card>
