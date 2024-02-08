<x-layout>


    <div class=" relative max-w-[1024px] mx-auto space-y-3 py-5 overflow-x-auto shadow-md sm:rounded-lg bg-white">
        <table class="pt-2 w-full text-sm text-left rtl:text-right text-black dark:text-gray-400">
            <thead class="text-xs text-black uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <h3 class=" pl-4 underline hover:decoration-dashed text-xl font-extrabold text-indigo-600">Applied Job
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
                    <th scope="col" class="px-6 py-3">
                        Action
                    </th>
                </tr>
            </thead>

            <tbody>
                @php
                    $n = 1;
                @endphp
                @foreach ($applied_jobs as $applied_job)
                    {{-- @dd($applied_job->job_post_id) --}}

                    <tr>
                        <td class="px-6 py-4">
                            {{ $n++ }}.
                        </td>
                        <td class="px-6 py-4">
                            {{ $applied_job->user->first_name . ' ' . $applied_job->user->middle_name . ' ' . $applied_job->user->last_name }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $applied_job->created_at->diffForHumans() }}
                        </td>
                        <td class="px-6 py-4 text-indigo-600">
                            {{ App\Models\Common::find($applied_job->appl_status)->details }}
                            {{-- {{ $applied_job->appl_status}} --}}
                        </td>
                        <td class="px-6 py-4">
                            {{-- <a href="{{ route('jobseekers.show', $applied_job->user_id, $applied_job->job_post_id) }}"
                                class="rounded-none border-none bg-none px-0 py-0 text-none font-normal hover:bg-none">
                                <i class="fa fa-eye" aria-hidden="true"></i>
                            </a> --}}

                            <a href="{{ route('jobseekers.show', ['user_id' => $applied_job->user_id, 'job_post_id' => $applied_job->job_post_id]) }}"
                                class="rounded-none border-none bg-none px-0 py-0 text-none font-normal hover:bg-none">
                                <i class="fa fa-eye" aria-hidden="true"></i>
                             </a>


                        </td>
                        <td>
                            <a href="{{ route('myjob_applications.edit', $applied_job->id) }}" class=" pl-2 py-0 px-0">
                                <i class="fa fa-pencil" aria-hidden="true"></i>
                                {{-- <i class="fa-solid fa-pencil"></i> --}}
                            </a>

                            <a href="{{ route('myjob_applications.edit', $applied_job->id) }}" class=" pl-2 py-0 px-0">
                                <i class="fa fa-trash" aria-hidden="true"></i>

                                {{-- <i class="fa-regular fa-trash-can"></i> --}}
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>

        </table>
    </div>

</x-layout>
