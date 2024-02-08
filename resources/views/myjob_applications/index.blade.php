<x-layout>
    <x-breadcrumb :links="['My Jobs' => '#']" class="mb-4" />

    <div class="mx-20">
        @forelse ($jobposts as $jobpost)
            <x-job-card :$jobpost>


                <div class="text-xs text-slate-500 ">
                    @forelse ($jobpost->jobApplications as $application)
                        <div class="mb-4 flex items-center justify-between">
                            <div>
                                {{-- @dd($application->job_post_id) --}}
                                <a
                                    href="{{ route('jobseekers.show', ['user_id' => $application->user_id, 'job_post_id' => $application->job_post_id]) }}">
                                    {{ $application->user->first_name . ' ' }}
                                    {{ $application->user->middle_name . ' ' }}
                                    {{ $application->user->last_name }}
                                </a>
                                <div>
                                    Applied {{ $application->created_at->diffForHumans() }}
                                </div>
                            </div>
                        </div>

                    @empty
                        <div class="pl-2">No applications yet</div>
                    @endforelse
                    <br>

                </div>
            </x-job-card>
        @empty
            <div class="rounded-md border border-dashed border-slate-300 p-8">
                <div class="text-center font-medium">
                    No jobs yet
                </div>
                <div class="text-center">
                    Post your first job <a class="text-indigo-500 hover:underline" href=" ">here!</a>
                </div>
        @endforelse

    </div>
    </div>
</x-layout>
