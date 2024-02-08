<div id="create-modal-experience" tabindex="-1" aria-hidden="true"
    class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-md max-h-full">
        <!-- Modal body -->
        <x-card class="mx-20 mb-8">
            <div class="inline-flex items-center">
                <!-- Modal header -->
                <h3 class="text-lg font-semibold text-orange-400 dark:text-white mb-2">
                    Create Experience
                </h3>
                <button type="button" class="w-8 h-8 ms-auto absolute right-6 bg-transparent rounded-lg text-sm text-gray-400 hover:bg-gray-200 hover:text-gray-900 dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="create-modal-experience">
                    <box-icon name='x-circle' type='solid' color='#f97316' ></box-icon>
                </button>
            </div>

            <form action="{{ route('experiences.store') }}" method="POST">
                @csrf
                <div class="mb-4 grid grid-cols-2 gap-4">
                    <div class="col-span-2">
                        <x-label for="exp_title" :required="true">Experience Title</x-label>
                        <x-text-input name="exp_title" onclick="event.stopPropagation();" />
                    </div>

                    <div class="col-span-2">
                        <x-label for="work_at" :required="true">Work At</x-label>
                        <x-text-input name="work_at" onclick="event.stopPropagation();"/>
                    </div>

                    <div class="col-span-2">
                        <x-label for="exp_details" :required="true">Experience Details</x-label>
                        <x-text-input name="exp_details" onclick="event.stopPropagation();"/>
                    </div>

                    <div class="col-span-2">
                        <x-label for="start_date" :required="true">Start Dates</x-label>
                        <x-text-input name="start_date" type="date" onclick="event.stopPropagation();"/>
                    </div>

                    <div class="col-span-2">
                        <x-label for="end_date" :required="true">End Date</x-label>
                        <x-text-input name="end_date" type="date" onclick="event.stopPropagation();"/>
                    </div>

                    <div class="col-span-2">
                        <x-button class="w-full">Create</x-button>
                    </div>
                </div>
            </form>
        </x-card>
    </div>
</div>
