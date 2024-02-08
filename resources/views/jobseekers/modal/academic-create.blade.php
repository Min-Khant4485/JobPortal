<div id="create-modal-academic" tabindex="-1" aria-hidden="true"
    class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-md max-h-full">
        <!-- Modal body -->
        <x-card class="mx-20 mb-8">
            <div class="inline-flex items-center">
                <!-- Modal header -->
                <h3 class="text-lg font-semibold text-orange-400 dark:text-white mb-2">
                    Create Academic
                </h3>
                <button type="button" class="w-8 h-8 ms-auto absolute right-6 bg-transparent rounded-lg text-sm text-gray-400 hover:bg-gray-200 hover:text-gray-900 dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="create-modal-academic">
                    <box-icon name='x-circle' type='solid' color='#f97316' ></box-icon>
                </button>
            </div>

            <form action="{{ route('academics.store') }}" method="POST">
                @csrf
                <div class="mb-4 grid grid-cols-2 gap-4">
                    {{-- <x-dropdown name="acad_type" :options="App\Models\Common::getAcadType()" model="AcadType" :mType="'acadType'" /> --}}

{{--
                    <div class="col-span-2">
                        <x-label for="acad_type" :required="true">Academic Type</x-label>
                        @php
                            $opt = App\Models\Common::getAcadType();
                        @endphp

                        @if (count($opt) > 0)
                            <x-dropdown name="acad_type" :options="$opt" model="Common" :mType="'acadType'"
                                selected="selected" />
                        @endif

                    </div> --}}

                    {{-- @dd($acad_types) --}}
                    <div class="col-span-2">
                        <x-label for="acad_type" :required="true">Academic Type</x-label>
                        <x-fun-dropdown name="acad_type" :options="$acad_types" model="Common" :mType="'acadType'" />
                    </div>


                    <div class="col-span-2">
                        <x-label for="faculty" :required="true">Faculty</x-label>
                        <x-text-input name="faculty" />
                    </div>

                    {{-- @dd( App\Models\Common::getAcadType()); --}}
                    <div class="col-span-2">
                        <x-label for="acad_institue" :required="true">Education Institue</x-label>
                        <x-text-input name="acad_institue" />
                    </div>

                    <div class="col-span-2">
                        <x-label for="start_date" :required="true">Start Dates</x-label>
                        <x-text-input name="start_date" type="date" />
                    </div>

                    <div class="col-span-2">
                        <x-label for="end_date" :required="true">End Date</x-label>
                        <x-text-input name="end_date" type="date" />
                    </div>

                    <div class="col-span-2">
                        <x-button class="w-full">Create</x-button>
                    </div>
                </div>
            </form>
        </x-card>
    </div>
</div>
