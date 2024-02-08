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

                    </div>
                </div>
            </div>
            <div class="mt-4 text-center border-b pb-5">
                <h1 class="text-4xl font-medium text-gray-700">
                    {{ $user->first_name . ' ' . $user->middle_name . ' ' . $user->last_name }}
                </h1>

                <div class="pt-20 p-5">

                    {{-- Introduction --}}

                    <div name="Introduction" class="grid grid-cols-2 justify-between mb-4">
                        <h3 class="text-left uppercase font-medium content-center pb-3">Introduction</h3>
                        <p class="flex text-gray-600 text-center font-normal lg:px-16"> {{ $user->bio }} </p>
                    </div>

                    {{-- Details --}}

                    <div name="Details">
                        <div class="grid grid-cols-2 justify-between mb-3">
                            <h3 class="text-left uppercase font-medium content-center pb-3">Details</h3>

                        </div>

                        <div class="p-1 flex">
                            <box-icon name='phone'></box-icon>
                            <h4 class="pl-3"> {{ $user->phone_no }}</h4>
                        </div>
                        <div class="p-1 flex">
                            <box-icon name='envelope'></box-icon>
                            <h4 class="pl-3"> {{ $user->email }}</h4>
                        </div>
                        <div class="p-1 flex">
                            <box-icon name='calendar'></box-icon>
                            <h4 class="pl-3"> {{ $user->dob }} </h4>
                        </div>
                    </div>
                </div>
            </div>
            {{-- Academic --}}
            <div class="p-5 mt-3 justify-center border-b">
                <div name="Academic" class="grid grid-cols-2 justify-between">
                    <h3 class="text-left uppercase font-medium content-center pb-3">Academic</h3>
                </div>
                <div class="p-2 flex items-center justify-between">
                    @if ($academic)
                        <div class="content-start justify-content grid grid-cols-6">
                            <box-icon type='solid' name='graduation' color='#f97316'></box-icon>
                            <h3> {{ App\Models\Common::find($academic->acad_type)->details }} </h3>
                            <h3> {{ $academic->faculty }} </h3>
                            <h3> {{ $academic->acad_institue }} </h3>
                            <h3> {{ \Carbon\Carbon::parse($academic->start_date)->format('d/m/Y') }} -
                                {{ \Carbon\Carbon::parse($academic->end_date)->format('d/m/Y') }} </h3>
                        </div>
                    @else
                        <p>No academic data available.</p>
                    @endif
                </div>
            </div>


            {{-- Experience --}}

            <div class="p-5 mt-3 justify-center border-b">
                <div name="Experience" class="grid grid-cols-2 justify-between">
                    <h3 class="text-left uppercase font-medium content-center pb-3">Experience</h3>

                </div>

                @foreach ($experiences as $experience)
                    <div class="p-2 flex items-center justify-between">
                        @if ($experience)
                            <div class="relative justify-content grid grid-cols-6">
                                <box-icon name='briefcase-alt-2' type='solid' color='#f97316'></box-icon>
                                <h3> {{ $experience->exp_title }} </h3>
                                <h3> {{ $experience->work_at }} </h3>
                                <h3> {{ $experience->exp_details }} </h3>
                                <h3> {{ \Carbon\Carbon::parse($experience->start_date)->format('d/m/Y') }} -
                                    {{ \Carbon\Carbon::parse($experience->end_date)->format('d/m/Y') }} </h3>
                            </div>
                        @else
                            <p>No experience data available.</p>
                        @endif
                    </div>
                @endforeach
            </div>

            {{-- Skill --}}

            <div class="p-5 mt-3 justify-center border-b pb-5">
                <div name="Skill" class="grid grid-cols-2 justify-between">
                    <h3 class="text-left uppercase font-medium content-center pb-3">Skill</h3>
                </div>

                <div class="flex border-none gap-1">
                    @foreach ($skills as $skill)
                        <div class="p-2 flex items-start justify-between">
                            @if ($skill)
                                <div class="relative justify-content">
                                    <span
                                        class="py-2.9 px-4.6 rounded-2 text-md bg-gradient-to-tl from-red-500 to-yellow-400 align-baseline font-bold uppercase leading-none text-white">
                                        {{ $skill->skillsSet->skill_name }}
                                    </span>
                                </div>
                            @else
                                <p>No skill data available.</p>
                            @endif
                        </div>
                    @endforeach
                </div>
            </div>

                <div class=" p-5 mt-3 justify-left border-b pb-5">
                    <div name="upload" class="grid grid-cols-2 justify-between">
                        <h3 class="text-left uppercase font-medium content-center pb-3">CV File</h3>
                    </div>
                    <div>

                        @if (!isset($user_profile_cv) || empty($user_profile_cv->upload_url))
                            <p>No Found CV file!</p>
                        @else
                            <form action="{{ route('cvdownload', ['cv_id' => $user_profile_cv->link_id]) }}"
                                method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="relative justify-content">
                                    {{ isset($user_profile_cv) ? basename(Storage::url($user_profile_cv->upload_url)) : 'No File Uploaded' }}
                                    <input type="hidden" name="cv_id" value="{{ $user_profile_cv->link_id }}" />
                                </div>
                                <x-button type="submit">Download CV</x-button>
                            </form>
                        @endif



                    </div>

                </div>

            </div>
        </div>
    </div>
</x-layout>
