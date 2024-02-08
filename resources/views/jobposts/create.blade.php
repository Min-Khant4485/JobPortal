<x-layout>
    <x-breadcrumb :links="['My Jobs' => route('jobposts.index'), 'Create' => '#']" class="mx-10 mb-4" />

    <x-card class="mx-20 mb-8">
        {{-- <form action="{{ route('posted_jobs.store') }}" method="POST"> --}}
        <form action="{{ route('jobposts.store') }}" method="POST">
            @csrf

            <div class="mb-4 grid grid-cols-2 gap-4">
                <div class="col-span-2">
                    <x-label for="job_title" :required="true">Job Title</x-label>
                    <x-text-input name="job_title" />
                </div>

                <div class="col-span-2">
                    <x-label for="description" :required="true">Description</x-label>
                    <x-text-input name="description" type="textarea" />
                </div>

                <div class="col-span-2">
                    <x-label for="requirement" :required="true">Job Requirements</x-label>
                    <x-text-input name="requirement" type="textarea" />
                </div>

                <div class="col-span-2">
                    <x-label for="currency" :required="true">Currency</x-label>
                    <x-fun-dropdown name="currency" :options="$currencies" model="Common" :mType="'currency'"
                        selected="selected" />
                </div>

                <div class="col-span-2">
                    <x-label for="salary" :required="true">Salary</x-label>
                    <x-text-input name="salary" placeholder="" type="text" value="" />
                </div>

                <div class="col-span-2">
                    <x-label for="city" :required="true">City</x-label>
                    <x-dropdown name="city_id" :options="$cities" model="City" :mType="'city'"
                        selected="selected" />
                </div>

                <div class="col-span-2">
                    <x-label for="job_type" :required="true">Job Type</x-label>
                    <x-fun-dropdown name="job_type" :options="$job_types" model="Common" :mType="'jobtype'"
                        selected="selected" />
                </div>

                <div class="col-span-2">
                    <x-label for="closing_date" :required="true">Closing Date</x-label>
                    <x-text-input name="closing_date" type="date" min="{{ now()->format('Y-m-d') }}"
                        max="{{ now()->addMonths(3)->format('Y-m-d') }}" />
                </div>

                <div class=" col-span-2">
                    <x-label for="job_status" :required="true">Job Status</x-label>
                    <x-fun-dropdown name="job_status" value="{{ $job_statuses }}" :options="$job_statuses" model="Common"
                        :mType="'jobStatus'" selected="selected" />
                </div>

                <div class="col-span-2">
                    <x-button class="w-full" type="submit">Create Job</x-button>
                </div>
            </div>
        </form>
    </x-card>
</x-layout>
