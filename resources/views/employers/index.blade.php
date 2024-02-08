<x-layout>
    <div class="mb-2 max-w-[2400px] mx-auto space-y-1 py-0">
        <div class="relative rounded-lg">
            <div name="employer_cover_photo" class="bg-cover bg-center w-auto h-[250px] opacity-50 bg-no-repeat"
                style="background-image: url('{{ asset('img/google-photo.webp') }}">
            </div>
            <div class="w-auto h-full bg-orange-400 flex relative justify-center gap-7">
                <a href="#"
                    class="hover:text-slate-100 cursor-pointer active:font transition-colors duration-300">About</a>
                <a href="#" class="hover:text-slate-100 cursor-pointer transition-colors duration-300">Jobs</a>
                <a href="#" class="hover:text-slate-100 transition-colors duration-300">Gallery</a>
            </div>
        </div>
    </div>

    <div class="relative max-w-[1024px] mx-auto space-y-3 mt-0 mb-4 rounded-lg">
        <div class="absolute z-30 top-3/5 translate-x-1/5 -translate-y-2/4 mt-0">
            <div class="grid grid-cols-1 md:grid-cols-3">
                <div class="relative">
                    @if ($employer_image)
                        <!-- If the profile image exists, display it -->
                        <img src="{{ Storage::url($employer_image->upload_url) }}" alt="Employer Image"
                            class="w-48 h-48 rounded-full">
                    @else
                        <!-- If no profile image exists, display the default image -->
                        {{-- <div
                        class="w-48 h-48 mx-auto bg-orange-100 ring-2 ring-white rounded-md shadow-xl absolute inset-x-0 top-0 -mt-24 flex items-center justify-center text-orange-500">
                        <box-icon name='image' type='solid' color='#f97316' size='lg'></box-icon>
                    </div>
                    @endif --}}
                        <a href="#" class="" data-modal-target="crud-modal-image"
                            data-modal-toggle="crud-modal-image" type="button" onclick="event.stopPropagation();">
                            <button class="flex top-9 right-15">
                                <box-icon name='camera-plus' type='solid' color='#f97316'></box-icon>
                            </button>
                            @include('employers.modal.image-update')
                        </a>
                        @include('employers.modal.image-update')
                    @endif
                </div>
            </div>
            <div
                class="absolute top-0 left-2/4 translate-x-3/4 -translate-y-1/4 mt-0 font-bold text-4xl text-slate-100 whitespace-nowrap">
                {{ $employer->company_name }}
            </div>
        </div>
    </div>
    <div class="pl-2">
        <x-link-button href="{{ route('employers.edit', $employer) }}">Edit</x-link-button>
    </div>

    <div class="flex justify-between max-w-[1024px] mx-auto space-y-3 mt-20">
        <div>
            <span class="font-bold">Recent Opening Jobs</span>
            <div class="m-0 grid grid-cols-3 gap-4">
                @foreach ($jobposts as $jobpost)
                    @if ($jobpost->job_status != 'Closed')
                        <x-card class="mt-2 col-span-1 flex-shrink-0 w-[340px] h-[200px]">
                            <div class="mb-2 flex justify-between">
                                <div class="w-full p-2 flex justify-between items-center bg-slate-300">
                                    <h3 class="p-1 text-gray-500 font-semibold">{{ $jobpost->job_title }}</h3>
                                </div>
                            </div>
                            <div>
                                <div class="flex items-center justify-between">
                                    <div class="flex items-center justify-between">
                                        <box-icon name='map'></box-icon>
                                        <h4 class="p-2 font-normal">{{ $jobpost->city->city_name }},
                                            {{ $jobpost->city->country->country_name }}</h4>
                                    </div>
                                    @if ($jobpost->deleted_at)
                                        <span class="text-xs text-red-500">Delete</span>
                                    @endif
                                </div>
                                <div class="pl-2 flex items-center justify-between card-foot">
                                    <h3 class="pt-2">{{ $jobpost->details }}</h3>
                                </div>
                            </div>
                        </x-card>
                    @endif
                @endforeach
            </div>
        </div>
    </div>

    <div class="max-w-[1024px] mx-auto space-y-3 mt-10 border rounded-lg shadow-md bg-orange-100">
        <div class="rounded-md">
            <div class="p-4 flex flex-col justify-items-between">
                <h3 class="font-bold text-xl">About {{ $employer->company_name }}</h3>
                <h3 class="relative">{{ App\Models\Industry::find($employer->industry_id)->industry_name }}</h3>
            </div>
            <div>
                <ul class="p-4">
                    <li>
                        <box-icon name='bar-chart'></box-icon>
                        <span>Employee Size: {{ $employer->num_of_employee }}</span>
                    </li>
                </ul>
            </div>
            <div class="flex justify-between mr-2 ml-2">
                <p class="flex p-4">{{ $employer->company_description }}</p>
            </div>
        </div>

        {{-- Images --}}
        <div class="bg-white dark:bg-gray-800 py-6 sm:py-8 lg:py-12">
            <div class="mx-auto max-w-screen-2xl px-4 md:px-8">
                <div class="mb-4 flex items-center justify-between gap-8 sm:mb-8 md:mb-12">
                    <div class="flex items-center gap-12">
                        <h2 class="text-2xl font-bold uppercase text-gray-800 lg:text-3xl dark:text-white">Gallery</h2>
                    </div>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
                    @forelse ($albums as $image)
                        <div class="relative">
                            <img src="{{ Storage::url($image->upload_url) }}" alt="Photo"
                                class="w-full h-48 object-cover object-center transition duration-300 transform hover:scale-50" />
                            <form action="{{ route('upload.destroy', $image) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button onclick="return confirmDelete()"
                                    class= "flex rounded-full ring-2 ring-white absolute bottom-3 right-4"> <box-icon
                                        name='trash' type='submit' color='#f97316'></box-icon></button>
                            </form>
                        </div>
                    @empty
                        <p class="text-center text-gray-500 mt-8">No images found.</p>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</x-layout>
