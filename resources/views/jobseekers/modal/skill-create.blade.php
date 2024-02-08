<div id="create-modal-skill" tabindex="-1" aria-hidden="true"
    class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-md max-h-full">
        <!-- Modal body -->
        <x-card class="mx-20 mb-8">
            <div class="inline-flex items-center">
                <!-- Modal header -->
                <h3 class="text-lg font-semibold text-orange-400 dark:text-white mb-2">
                    Create Skills
                </h3>
                <button type="button" class="w-8 h-8 ms-auto absolute right-6 bg-transparent rounded-lg text-sm text-gray-400 hover:bg-gray-200 hover:text-gray-900 dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="create-modal-skill">
                    <box-icon name='x-circle' type='solid' color='#f97316'></box-icon>
                </button>
            </div>

            <form action="{{ route('jobseeker_skills.store') }}" method="POST">
                @csrf
                <div class="mb-4 grid grid-cols-2 gap-4">
                    <div class="col-span-2">
                        <x-label for="skills_set_id" :required="true">Skills</x-label>
                        <x-dropdown name="skills_set_id" :options="$skills_sets" model="SkillsSet" :mType="'skills_set'"
                            selected="selected" />
                    </div>
                    <div class="col-span-2">
                        <x-button class="w-full">Create</x-button>
                    </div>
                </div>
            </form>
        </x-card>
    </div>
</div>
