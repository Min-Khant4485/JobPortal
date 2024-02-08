<x-layout>


    <div class="relative max-w-[1024px] mx-auto space-y-3 py-5 overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400 bg-white">
            <thead class="text-xs text-black uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <h3 class=" pl-4 text-xl font-extrabold text-indigo-600">Applied Job

                    Title :: {{ $job_title }}</h3>
                <hr>

                <tr>
                    <th scope="col" class="px-6 py-3">
                        No
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Name
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Applied Date
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Job Status
                    </th>
                    <th scope="col" class="px-6 py-3">
                        View Profile
                    </th>

                </tr>
            </thead>


            <tbody>

                @php
                    $n = 1;
                @endphp
                <tr class="text-black">
                    <td class="px-6 py-4">
                        {{ $n++ }}
                    </td>
                    <form action="{{ route('myjob_applications.update', $applied_job->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <td class="px-6 py-4">
                            {{ $applied_job->user->first_name . ' ' . $applied_job->user->middle_name . ' ' . $applied_job->user->last_name }}
                        </td>

                        {{-- <td class="px-6 py-4">
                            <x-text-input name="applied_date" class=" text-blue-500 border-none bg-gray-50" value="{{ $applied_job->created_at->diffForHumans() }}"
                                readonly />
                        </td> --}}

                        <td class="px-6 py-4">
                            {{ $applied_job->created_at->diffForHumans() }}

                        </td>

                        <td>
                            <x-fun-dropdown class=" text-blue-600" name="appl_status" :options="$job_statuses" model="Common"
                                :mType="'jobStatus'" :selected="$job_status" />
                        </td>
                        {{-- <td class="px-6 py-4">
                            <x-link-button :href="route('jobseekers.show', ['jobSeeker' => $applied_job->user_id])" class="">
                                <i class="fa-regular fa-eye"></i>
                            </x-link-button>
                        </td> --}}
                        {{-- @dd($applied_job->user->id); --}}
                        {{-- @dd($applied_job->job_post_id); --}}
                        <td class="px-6 py-4">
                            <x-link-button :href="route('jobseekers.show', [
                                'user_id' => $applied_job->user_id,
                                'job_post_id' => $applied_job->job_post_id,
                            ])" class="">
                                <i class="fa-regular fa-eye"></i>
                            </x-link-button>
                        </td>
                        <td>
                            <div class="col-span-2 pr-5">
                                <x-button class="w-full">Update</x-button>
                            </div>
                        </td>
                    </form>

                </tr>

            </tbody>

        </table>
    </div>

</x-layout>
