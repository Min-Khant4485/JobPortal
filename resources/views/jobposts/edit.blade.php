<x-layout>
    <x-breadcrumb :links="['My Jobs' => route('jobposts.index'), 'Edit Job' => '#']" class="mb-4" />

    <x-card class="mx-20 mb-8">
        <form action="{{ route('jobposts.update', $jobpost) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-4 grid grid-cols-2 gap-4">
                <div class="col-span-2">
                    <x-label for="job_title" :required="true">Job Title</x-label>
                    <x-text-input name="job_title" type="text" value="{{ $jobpost->job_title }}" />
                </div>

                <div class="col-span-2">
                    <x-label for="description" :required="true">Description</x-label>
                    <x-text-input name="description" type="textarea" value="{{ $jobpost->description }}" />
                </div>
                <div class="col-span-2">
                    <x-label for="requirement" :required="true">Job Requirements</x-label>
                    <x-text-input name="requirement" type="textarea" value="{{ $jobpost->requirement }}" />
                </div>

                <div class="col-span-2">
                    <x-label for="currency" :required="true">Currency</x-label>
                    <x-fun-dropdown name="currency" :options="$currencies" model="Common" :mType="'currency'"
                        :selected="$currency" />
                </div>

                <div class="col-span-2">
                    <x-label for="salary" :required="true">Salary</x-label>
                    <x-text-input name="salary" type="number" value="{{ $jobpost->salary }}" />
                </div>

                <div class="col-span-2">
                    <x-label for="city" :required="true">City</x-label>
                    <x-dropdown name="city_id" :options="$cities" model="City" :mType="'city'"
                        :selected="$city" />
                </div>

                <div class="col-span-2">
                    <x-label for="job_type" :required="true">Job Type</x-label>
                    <x-fun-dropdown name="job_type" :options="$job_types" model="Common" :mType="'jobType'"
                        :selected="$job_type" />
                </div>

                <div class="col-span-2">
                    <x-label for="closing_date" :required="true">Closing Date</x-label>
                    <x-text-input name="closing_date" type="date" value="{{ $jobpost->closing_date }}" />
                </div>

                <div class=" col-span-2">
                    <x-label for="job_status" :required="true">Job Status</x-label>
                    <x-fun-dropdown name="job_status" :options="$job_statuses->whereIn('id', [32, 33])" model="Common" :mType="'jobStatus'"
                        :selected="$job_status" />
                </div>
                <div class="col-span-2">
                    <x-button class="w-full">Edit Job</x-button>
                </div>
            </div>
        </form>
    </x-card>
</x-layout>
