<x-layout>
    <div class="relative">
        <div class="absolute z-40 top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2">
            <form x-ref="filters" id="filtering-form" class="mb-1" action="{{ route('jobposts.index') }}" method="GET">
                <label for="default-search"
                    class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Search</label>
                <div class="mb-8 mt-4 grid grid-cols-12 gap-3">
                    <div class="flex items-center col-span-4 ml-3">
                        <x-text-input name="search" value="{{ request('search') }}" placeholder="Search for any text"
                            form-ref="filters" class="rounded-md" />
                    </div>
                    <div class="flex items-center col-span-3">
                        <x-dropdown name="city_id" :options="$cities" model="City" :mType="'city'"
                            selected="selected" class="w-full rounded-md" />
                    </div>
                    <div class="flex items-center col-span-4">
                        <x-dropdown name='industry_id' :options="$industries" model="Industry" :mType="'industry'"
                            selected="selected" class="w-full rounded-md" />
                    </div>


                    <div class="flex items-center col-span-1">
                        <x-button>Search</x-button>
                    </div>
                </div>

            </form>
        </div>

        <div id="animation-carousel" class="relative w-full" data-carousel="static">
            <!-- Carousel wrapper -->
            <div class="relative transition-transform duration-500 transform h-56 overflow-hidden md:h-60">
                <!-- Items -->
                @foreach ($sliders as $i => $slider)
                    <div class="duration-500 ease-linear " data-carousel-item>
                        <img src="{{ asset('img/' . basename($slider->path)) }}"
                            class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2">
                    </div>
                @endforeach
            </div>
            <!-- Slider controls -->
            <button type="button"
                class="absolute top-0 start-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none"
                data-carousel-prev>
                <span
                    class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                    <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M5 1 1 5l4 4" />
                    </svg>
                    <span class="sr-only">Previous</span>
                </span>
            </button>
            <button type="button"
                class="absolute top-0 end-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none"
                data-carousel-next>
                <span
                    class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                    <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 9 4-4-4-4" />
                    </svg>
                    <span class="sr-only">Next</span>
                </span>
            </button>
        </div>

        <script>
            document.addEventListener('DOMContentLoaded', function() {
                var carousel = document.querySelector('[data-carousel="static"]');
                var interval = 5000;

                function nextSlide() {
                    var nextButton = document.querySelector('[data-carousel-next]');
                    nextButton.click();
                }
                setInterval(nextSlide, interval);
            });
        </script>
    </div>

    @section('content')
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card-header">{{ __('Dashboard') }}</div>
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        {{ __('You are logged in!') }}
                    </div>
                </div>
            </div>
        </div>
        </div>
    @endsection

    {{-- Latest Jobs --}}





    <div class="container border m-5 bg-slate-200">
        <h3 class=" mx-4 text-2xl text-slate-950 font-semibold mt-1">Latest Jobs</h3>
        <div class="mb-1 mt-1 ml-4 mr-4 grid grid-cols-2 gap-4">
            {{-- @dd($jobposts); --}}
            @foreach ($jobposts as $jobpost)
                <div>
                    <form action="{{ route('job_hunts.store') }}" method="POST">
                        @csrf
                        {{-- @dd($jobpost->id); --}}
                        <x-job-card :$jobpost>
                            <div class="flex justify-between pt-2">
                                <div class="text-left">
                                    <x-link-button :href="route('jobposts.show', $jobpost)">
                                        Show Details
                                    </x-link-button>
                                </div>
                                <input type="hidden" name="job_post_id" value="{{ $jobpost->id }}">
                                @php
                                    $currentJobApplication = $jobApplication ? $jobApplication->where('job_post_id', $jobpost->id)->first() : null;

                                    $currentJobClose = $job_close ? $job_close->where('job_post_id', $jobpost->id)->first() : null;

                                @endphp

                                @if ($currentJobApplication)
                                    <div class="text-right">
                                        <button
                                            class="rounded-md border border-slate-300 bg-orange-100 px-2.5 py-1.5 text-center text-sm font-semibold text-gray-700 hover"
                                            disabled>
                                            Submitted
                                        </button>
                                    </div>
                                @elseif($currentJobClose)
                                    <div class="text-right">
                                        <button
                                            class="rounded-md border border-slate-300 bg-orange-100 px-2.5 py-1.5 text-center text-sm font-semibold text-gray-700 hover"
                                            disabled>
                                            Closed
                                        </button>
                                    </div>
                                @else
                                    <div class="text-right">
                                        <x-button class="">Apply</x-button>
                                    </div>
                                @endif
                            </div>
                        </x-job-card>
                    </form>
                </div>
            @endforeach

        </div>
    </div>


    {{-- <x-job-card class="mb-4" :$jobpost :$currency>
        <div>
            <x-link-button :href="route('jobposts.show', $jobpost)">
                Show
            </x-link-button>
        </div>
    </x-job-card> --}}

</x-layout>
