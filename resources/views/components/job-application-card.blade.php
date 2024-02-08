<x-card class="  my-5 max-w-[1024px] mx-auto space-y-3 py-5 border rounded-none">
    <div class="mb-2 flex justify-between">
        <div class="w-full p-2 flex justify-between items-center bg-slate-800">
            {{-- @dd(($jobapplication->job_post_id)->employer->company_name) --}}
            {{-- @dd(App\Models\Common::find($jobapplication->job_post)) --}}
            <h3 class=" p-2 text-gray-50 font-semibold">Job Title
                :{{ App\Models\JobPost::find($jobapplication->job_post_id)->job_title }} </h3>
        </div>
        <div class="text-slate-500">
        </div>
    </div>

    <div class="">
        <div class="flex item-center justify-between">
            <div class=" flex items-center">
                <img src="https://cdn.pixabay.com/photo/2020/07/01/12/58/icon-5359554_640.png"
                    class=" p-2 w-[50px] h-[50x] rounded-full me-auto" />
                <p class=" pl-2 font-bold">
                    {{ App\Models\JobPost::find($jobapplication->job_post_id)->employer->company_name }}
                </p>
            </div>
            <div class="flex items-center justify-between">
                <box-icon name='map'></box-icon>
                <h4 class=" p-2 font-normal">
                    {{ App\Models\JobPost::find($jobapplication->job_post_id)->city->city_name }},
                    {{ App\Models\JobPost::find($jobapplication->job_post_id)->city->country->country_name }}</h4>
            </div>
            @if ($jobapplication->deleted_at)
                <span class="text-xs text-red-500">Delete</span>
            @endif
        </div>
        <div class=" flex items-center justify-left">
            <div class=" flex content-center">
                <div class=" ps-1 py-0.5 items-center"> <box-icon name='time-five'></box-icon></div>
                <div class=" ps-1 items-center">
                    {{ $jobapplication->created_at->diffForHumans() }}
                </div>
            </div>
        </div>
        <h3 class=" pl-2 pt-2 font-medium">Description</h3>

        <p class=" pl-2"> {{ App\Models\JobPost::find($jobapplication->job_post_id)->description }}</p>

        <div class="pl-2 flex items-center justify-between card-foot">

            <h3> </h3>
            <h3 class=" pt-2"></h3>
            <h3> Deadline: {{ App\Models\JobPost::find($jobapplication->job_post_id)->closing_date }}</h3>
        </div>
    </div>
    {{ $slot }}
</x-card>
