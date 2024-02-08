{{-- <x-layout>
    <x-breadcrumb class="mb-4" :links="['Jobs' => route('jobposts.index')]" />
    @foreach ($jobposts as $jobpost)
        @if ($jobpost->job_status != 'Closed')
            <x-job-card class="mb-4" :$jobpost :$currency>
                <br>
                <div class="pl-2">
                    <x-link-button :href="route('jobposts.show', $jobpost)">
                        Show
                    </x-link-button>
                </div>
            </x-job-card>
        @endif
    @endforeach
</x-layout> --}}
