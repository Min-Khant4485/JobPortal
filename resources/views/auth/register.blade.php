<x-layout>
    <h1 class="my-10 text-center text-4xl font-medium text-orange-400">
        Register your account!
    </h1>
    <x-card class="py-8 px-16">
        <form action="{{ route('register') }}" method="POST">
            @csrf
            @php
                $roles = \App\Models\Common::getUserRole()->whereIn('id', [24, 25]);
            @endphp

            {{-- <div name="user_role" class="mt-3 mb-8 flex items-center max-w-md gap-1 p-1 mx-auto my-2 bg-gray-100 rounded-lg dark:bg-gray-600">
                    <x-radio-group name="role" :options="$roles" checked="checked"
                        class="cursor-pointer select-none rounded-xl p-2 text-center peer-checked:bg-orange-400 peer-checked:font-bold peer-checked:text-white" />
                </div>                 --}}

            <div class="mt-3 mb-8 flex items-center max-w-md mx-auto">
                <div class="flex w-full relative">
                    <x-radio-group name="role" :options="$roles" checked />
                </div>
            </div>

            <div class="mb-8">
                <x-label for="first_name" :required="false">First Name</x-label>
                <x-text-input name="first_name" />
            </div>

            <div class="mb-8">
                <x-label for="middle_name" :required="false">Middle Name</x-label>
                <x-text-input name="middle_name" />
            </div>

            <div class="mb-8">
                <x-label for="last_name" :required="true">Last Name</x-label>
                <x-text-input name="last_name" />
            </div>

            <div class="mb-8">
                <x-label for="phone_no" :required="true">Phone Number</x-label>
                <x-text-input name="phone_no" type="number" value="" />
            </div>

            <div class="mb-8">
                <x-label for="email" :required="true">E-mail</x-label>
                <x-text-input name="email" />
            </div>

            <div class="mb-8">
                <x-label for="password" :required="true">Password</x-label>
                <x-text-input name="password" type="password" required autocomplete="new-password" />
            </div>

            <div class="mb-8">
                <x-label for="password_confirmation" :required="true">Confirm Password</x-label>
                <x-text-input name="password_confirmation" type="password" required autocomplete="new-password" />
            </div>

            <x-button class="w-full">Register</x-button>
        </form>
    </x-card>
</x-layout>
