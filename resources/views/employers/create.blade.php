<x-layout>
    <x-breadcrumb :links="['Home' => route('home.index'), 'Log Out' => '#']" class="mb-4" />

    <x-card class="mb-8">
        <form action="{{ route('employers.store') }}" method="POST">
            @csrf

            <div>
                <title>Create Company Profile</title>
            </div>
            {{-- @dd($user->role) --}}
            <div class="mb-4 grid grid-cols-2 gap-4">
                <div class="col-span-2">
                    <x-label for="company_name" :required="false">Company Name</x-label>
                    <x-text-input name="company_name" type="text" />
                </div>

                <div class="col-span-2">
                    <x-label for="company_description" :required="true">Company Description</x-label>
                    <x-text-input name="company_description" type="textarea" />
                </div>

                <div class="col-span-2">
                    <x-label for="num_of_employee" :required="true">Number of Employee</x-label>
                    <x-text-input name="num_of_employee" type="text" />
                </div>

                <div class="col-span-2">
                    <x-label for="industry" :required="true">Industry</x-label>
                    <x-dropdown name='industry_id' :options="$industries" model="Industry" :mType="'industry'"
                        selected="selected" />
                </div>

                <div class="col-span-2">
                    <x-button class="w-full">Create</x-button>
                </div>
            </div>
        </form>
    </x-card>
</x-layout>
