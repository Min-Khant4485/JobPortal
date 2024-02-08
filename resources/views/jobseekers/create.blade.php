<x-layout>
    <x-breadcrumb :links="['Profile' => route('jobseekers.index'), 'Create' => '#']" class="mb-4" />

    <x-card class="mb-8">
        <form action="{{ route('jobseekers.store') }}" method="POST">
            @csrf
            <div class="mb-4 grid grid-cols-2 gap-4">
                <div class="col-span-2">
                    <x-label for="dob" :required="true">Date of Birth</x-label>
                    <x-text-input name="dob" type="date" value="" min=""
                        max="{{ now()->subYears(18)->format('Y-m-d') }}" />
                </div>

                {{-- <div class="col-span-2">
                    <x-label for="dob" :required="true">Date of Birth</x-label>
                    <x-text-input name="dob" type="date" value="{{ $user->dob }}" onclick="event.stopPropagation();" />
                </div> --}}

                <div class="col-span-2">
                    <x-button name="confirm_btn" class="w-full">Confirm</x-button>
                </div>


            </div>
        </form>
        <div class="text-center justify-self-end">
            <form method="POST" action="{{ route('users.destroy', auth()->user()->id) }}">
                @csrf
                @method('DELETE')

                <div class="col-span-2">
                    <x-button type="submit" class="w-full text-red-500 hover:underline"
                        onclick="return confirm('Are you back to register?')"> Cancel! </x-button>
                </div>

                {{-- <button type="submit" class="text-indigo-500 hover:underline"
                    onclick="return confirm('Are you back to register?')">Cancel!</button> --}}
            </form>
        </div>

    </x-card>
</x-layout>
