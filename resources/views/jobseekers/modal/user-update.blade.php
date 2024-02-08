<div id="crud-modal-user" tabindex="-1" aria-hidden="true"
    class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-md max-h-full">
        <!-- Modal body -->
        <x-card class="mx-20 mb-8">
            <div class="flex">
                <!-- Modal header -->
                <h3 class="text-lg text-left font-semibold text-orange-400 dark:text-white mb-2">
                    Introduction
                </h3>
                <button type="button" class="w-8 h-8 ms-auto absolute right-6 bg-transparent rounded-lg text-sm text-gray-400 hover:bg-gray-200 hover:text-gray-900 dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="crud-modal-user">
                    <box-icon name='x-circle' type='solid' color='#f97316' ></box-icon>
                </button>
            </div>
            <form action="{{ route('users.update', $user) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-4 grid grid-cols-2 gap-4 text-start">                    
                    <div class="col-span-2">
                        <x-label for="phone_no" :required="true">Phone Number</x-label>
                        <x-text-input name="phone_no" value="{{ $user->phone_no }}" onclick="event.stopPropagation();" />
                    </div>
                    <div class="col-span-2">
                        <x-label for="dob" :required="true">Date of Birth</x-label>
                        <x-text-input name="dob" type="date" value="{{ $user->dob }}" onclick="event.stopPropagation();" />
                    </div>
                    <div class="col-span-2">
                        <x-label for="email" :required="true">Email</x-label>
                        <x-text-input name="email" value="{{ $user->email }}" onclick="event.stopPropagation();" />
                    </div>
                    <div class="col-span-2">
                        <x-button class="w-full">Update</x-button>
                    </div>
                </div>
            </form>
        </x-card>
    </div>
</div>

