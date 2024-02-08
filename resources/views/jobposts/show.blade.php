<x-layout>
    <x-breadcrumb class="mb-4" :links="['JobPosts' => route('jobposts.index'), $jobpost->job_title => '#']" />
    <x-job-card :$jobpost>
        <div class=" flex justify-between">
            <div class="pl-2">

                <x-link-button :href="route('jobposts.index')">
                    <box-icon name='undo'></box-icon>
                </x-link-button>
            </div>
        </div>
    </x-job-card>

</x-layout>
