<x-layout>
    <div class="p-16">
        <div class="p-8 bg-white rounded-lg shadow mt-24">
            <div class="grid grid-cols-1 md:grid-cols-3">
                <div class="relative">
                    <div
                        class="w-48 h-48 mx-auto bg-orange-100 ring-2 ring-white rounded-full shadow-xl absolute inset-x-0 top-0 -mt-24 flex items-center justify-center text-orange-500">
                        @if ($profile_image)
                            <!-- If the profile image exists, display it -->
                            <img src="{{ Storage::url($profile_image->upload_url) }}" alt="Profile Image"
                                class="w-48 h-48 rounded-full">
                        @else
                            <!-- If no profile image exists, display the default image -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-24 w-24" viewBox="0 0 20 20"
                                fill="currentColor">
                                <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z"
                                    clip-rule="evenodd" />
                            </svg>
                        @endif

                        <a href="#" class="" data-modal-target="crud-modal-photo"
                            data-modal-toggle="crud-modal-photo" type="button" onclick="event.stopPropagation();">
                            <button class="flex rounded-full ring-2 ring-white absolute bottom-5 right-8">
                                <box-icon name='camera-plus' type='solid' color='#f97316'></box-icon>
                            </button>
                            @include('jobseekers.modal.photo-update')
                        </a>
                    </div>
                </div>
            </div>
            <div class="mt-4 text-center border-b pb-5">
                <h1 class="text-4xl font-medium text-gray-700">
                    {{ $jobseeker->user->first_name . ' ' . $jobseeker->user->middle_name . ' ' . $jobseeker->user->last_name }}
                </h1>

                <div class="pt-20 p-5">

                    {{-- Introduction --}}

                    <div name="Introduction" class="grid grid-cols-2 justify-between mb-4">
                        <h3 class="text-left uppercase font-medium content-center pb-3">Introduction</h3>
                        <a href="#" class="text-end" data-modal-target="crud-modal-jobseeker"
                            data-modal-toggle="crud-modal-jobseeker" type="button" onclick="event.stopPropagation();">
                            <box-icon name='edit' color='#f97316'></box-icon>
                            @include('jobseekers.modal.jobseeker-update')
                        </a>
                        <p class="flex text-gray-600 text-center font-normal lg:px-16"> {{ $jobseeker->bio }} </p>
                    </div>

                    {{-- Details --}}

                    <div name="Details">
                        <div class="grid grid-cols-2 justify-between mb-3">
                            <h3 class="text-left uppercase font-medium content-center pb-3">Details</h3>
                            <a href="#" class="text-end" data-modal-target="crud-modal-user"
                                data-modal-toggle="crud-modal-user" type="button" onclick="event.stopPropagation();">
                                <box-icon name='edit' color='#f97316'></box-icon>
                                @include('jobseekers.modal.user-update')
                            </a>
                        </div>

                        <div class="p-1 flex">
                            <box-icon name='phone'></box-icon>
                            <h4 class="pl-3"> {{ $jobseeker->user->phone_no }}</h4>
                        </div>
                        <div class="p-1 flex">
                            <box-icon name='envelope'></box-icon>
                            <h4 class="pl-3"> {{ $jobseeker->user->email }}</h4>
                        </div>
                        <div class="p-1 flex">
                            <box-icon name='calendar'></box-icon>
                            <h4 class="pl-3"> {{ $jobseeker->user->dob }} </h4>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Academic --}}

            <div class="p-5 mt-3 justify-center border-b">
                <div name="Academic" class="grid grid-cols-2 justify-between">
                    <h3 class="text-left uppercase font-medium content-center pb-3">Academic</h3>
                    <a href="#" class="text-end" data-modal-target="create-modal-academic"
                        data-modal-toggle="create-modal-academic" type="button" onclick="event.stopPropagation();">
                        <box-icon name='add-to-queue' color='#f97316'></box-icon>
                    </a>
                    @include('jobseekers.modal.academic-create')
                </div>

                @foreach ($academics as $academic)
                    <div class="p-2 flex items-center justify-between">
                        <div class="content-start justify-content grid grid-cols-6">
                            <box-icon type='solid' name='graduation' color='#f97316'></box-icon>
                            <h3> {{ App\Models\Common::find($academic->acad_type)->details }} </h3>
                            <h3> {{ $academic->faculty }} </h3>
                            <h3> {{ $academic->acad_institue }} </h3>
                            <h3> {{ \Carbon\Carbon::parse($academic->start_date)->format('d/m/Y') }} -
                                {{ \Carbon\Carbon::parse($academic->end_date)->format('d/m/Y') }} </h3>
                        </div>
                        <a href="#" class="justify-content-end" data-modal-target="crud-modal-academic"
                            data-modal-toggle="crud-modal-academic" type="button" onclick="event.stopPropagation();">
                            <box-icon name='edit' color='#f97316'></box-icon>
                        </a>
                        @include('jobseekers.modal.academic-update')
                    </div>
                @endforeach
            </div>

            {{-- Experience --}}

            <div class="p-5 mt-3 justify-center border-b">
                <div name="Experience" class="grid grid-cols-2 justify-between">
                    <h3 class="text-left uppercase font-medium content-center pb-3">Experience</h3>
                    <a href="#" class="text-end" data-modal-target="create-modal-experience"
                        data-modal-toggle="create-modal-experience" type="button" onclick="event.stopPropagation();">
                        <box-icon name='add-to-queue' color='#f97316'></box-icon>
                    </a>
                    @include('jobseekers.modal.experience-create')
                </div>

                @foreach ($experiences as $experience)
                    <div class="p-2 flex items-center justify-between">
                        <div class="relative justify-content grid grid-cols-6">
                            <box-icon name='briefcase-alt-2' type='solid' color='#f97316'></box-icon>
                            <h3> {{ $experience->exp_title }} </h3>
                            <h3> {{ $experience->work_at }} </h3>
                            <h3> {{ $experience->exp_details }} </h3>
                            <h3> {{ \Carbon\Carbon::parse($experience->start_date)->format('d/m/Y') }} -
                                {{ \Carbon\Carbon::parse($experience->end_date)->format('d/m/Y') }} </h3>
                        </div>
                        <a href="#" class="justify-content-end" data-modal-target="crud-modal-experience"
                            data-modal-toggle="crud-modal-experience" type="button">
                            <box-icon name='edit' color='#f97316'></box-icon>
                        </a>
                        @include('jobseekers.modal.experience-update')
                    </div>
                @endforeach
            </div>

            {{-- Skill --}}

            <div class="p-5 mt-3 justify-center border-b pb-5">
                <div name="skillCreate" class="grid grid-cols-2 justify-between">
                    <h3 class="text-left uppercase font-medium content-center pb-3">Skill</h3>

                    <a href="#" class="text-end" data-modal-target="create-modal-skill"
                        data-modal-toggle="create-modal-skill" type="button" onclick="event.stopPropagation();">
                        <box-icon name='add-to-queue' color='#f97316'></box-icon>
                    </a>
                    @include('jobseekers.modal.skill-create')
                </div>

                @forelse ($skills as $skill)
                    <div class="p-2 flex border-none gap-0.5 justify-between">
                        <div class="relative justify-content">
                            <span class="py-2.9 px-4.6 rounded-2 text-md bg-gradient-to-tl from-red-500 to-yellow-400 align-baseline font-bold uppercase leading-none text-white">
                                {{ $skill->skillsSet->skill_name }}
                            </span>
                        </div>
                    </div>
                    @empty
                        <p>No skills available.</p>
                @endforelse

                    {{-- <a href="#"
                    class="items-end justify-content-end" data-modal-target="crud-modal-skill" data-modal-toggle="crud-modal-skill"
                        type="button">
                            <box-icon name='edit' color='#f97316'></box-icon>
                    </a>
                    @include('jobseekers.modal.skill-update') --}}
                </div>




            </div>

            {{-- CV Upload --}}

            <div class=" p-5 mt-3 justify-left border-b pb-5">
                <div name="upload" class="grid grid-cols-2 justify-between">
                    <h3 class="text-left uppercase font-medium content-center pb-3">CV File</h3>
                </div>
                <div>

                    @if (!isset($profile_cv) || empty($profile_cv->upload_url))
                        <form action="{{ route('upload.store') }}" method="POST" enctype="multipart/form-data"
                            class="mx-auto">
                            @csrf

                            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                                for="user_avatar">Upload file</label>
                            <input
                                class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                                aria-describedby="user_avatar_help" id="user_avatar" type="file" name="upload_cv"
                                accept=".pdf, .docx">
                            <div class="mt-1 text-sm text-gray-500 dark:text-gray-300" id="user_avatar_help">Cv file
                                is useful to confirm yourself</div>

                            <x-button class="">Upload</x-button><br>
                        </form>
                    @else
                        <div class=" flex justify-left">
                            <div class="justify-center">
                                <form action="{{ route('cvdownload', ['cv_id' => $profile_cv->link_id]) }}"
                                    method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="relative justify-content">
                                        {{ isset($profile_cv) ? basename(Storage::url($profile_cv->upload_url)) : 'No File Uploaded' }}
                                        <input type="hidden" name="cv_id" value="{{ $profile_cv->link_id }}" />
                                    </div>
                                    <x-button type="submit">Download CV</x-button>
                                </form>
                            </div>

                            <div class=" pr-0">
                                <x-button data-modal-target="update-cv-modal" data-modal-toggle="update-cv-modal"
                                    class="mt-6 ml-2" type="button">
                                    Edit CV
                                </x-button>
                                @include('jobseekers.modal.update-cv')
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-layout>
