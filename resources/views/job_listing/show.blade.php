{{-- <x-layout>
    <x-breadcrumb class="mb-4" :links="['JobPosts' => route('jobposts.index'), $jobpost->job_title => '#']" />
    <x-job-card :$jobpost>
        <div class="text-sm text-slate-500 mb-4">
            <div class="pl-2">{!! nl2br($jobpost->description) !!}</div>
            <div class="pl-2">{{ $jobpost->requirement }}</div>
            <div class="flex items-center space-x-20">
                <div class="mb-2 mr-10">
                    {{-- {{ \App\Models\JobPost::getJobType($jobpost) }} --}}
                {{-- </div>
                <div class="mb-2 mr-10">{{ App\Models\Common::find($jobpost->job_status)->details }}</div>
                <div class="mb-2">Closing Date:
                    {{ $jobpost->closing_date }}</div>
            </div>
        </div>
        <div class="pl-2">
            <x-link-button :href="route('jobposts.index')">
                Back
            </x-link-button>
        </div>

        @can('apply', $jobpost)
            @if (auth()->user()->role == 'User')
                <x-link-button :href="route('job_applications.create', $jobpost)">
                    Apply
                </x-link-button>
            @endif
        @else
            <x-link-button :href="route('job_applications.create', $jobpost)">
                Apply
            </x-link-button>
        @endcan
    </x-job-card> --}}

    {{-- <x-card class="mb-4">
        <h2 class="mb-4 text-lg font-medium">
            {{-- More {{ $jobpost->employer->user->company_name }} Jobs --}}
    {{-- </h2>
        <div class="text-sm text-slate-500">
            @foreach ($jobpost->employer->jobPosts as $otherJob)
                <div class="mb-4 flex justify-between">
                    <div>
                        <div class="text-slate-700">
                            <a href="{{ route('jobposts.show', $otherJob) }}">
                                {{ $otherJob->job_title }}
                            </a>
                        </div>
                        <div>
                            {{ $otherJob->created_at->diffForHumans() }}
                        </div>
                    </div>
                    <div class="text-xs">
                        @if ($currency = $currency->where('id', $jobpost->currency)->first())
                            {{ $currency->details . ' ' }}
                        @endif
                        {{ $otherJob->salary }}
                    </div>
                </div>
            @endforeach
        </div> --}}
    {{-- </x-card> --}}
{{-- </x-layout> --}} 
