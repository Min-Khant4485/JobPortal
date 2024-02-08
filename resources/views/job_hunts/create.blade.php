<x-layout>
    <x-breadcrumb class="mb-4" :links="[
        'Jobposts' => route('jobposts.index'),
        $jobpost->title => route('jobposts.show', $jobpost),
        'Apply' => '#',
    ]" />
    <x-job-card :$jobpost :$currency />
    <x-card>
        <h2 class="mb-4 text-lg font-medium">
            Your Job Application
        </h2>
        <form action="{{ route('job_hunts.store', $jobpost) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-4">
                <x-label for="appl_status" :required="true">
                    Application Status
                </x-label>
                <x-text-input type="number" name="appl_status" />
            </div>
            {{-- <div class="mb-4">
                <x-label for="cv" :required="true">Upload CV</x-label>
                <x-text-input type="file" name="cv" />
            </div> --}}
            <x-button class="w-full">Apply</x-button>
        </form>
    </x-card>
</x-layout>
