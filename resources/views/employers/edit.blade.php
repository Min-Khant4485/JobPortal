<x-layout>
    <x-breadcrumb :links="['Home' => route('home.index'), 'Log Out' => '#']" class="mb-4" />

    <x-card class="mb-8">
        <form action="{{ route('employers.update', $employer) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div>
                <title>Update Company Profile</title>
            </div>
            {{-- @dd($user->role) --}}
            <div class="mb-4 grid grid-cols-2 gap-4">


                <div class="col-span-2">
                    <x-label for="company_name" :required="false">Company Name</x-label>
                    <x-text-input name="company_name" type="text" value="{{ $employer->company_name }}" />
                </div>

                <div class="col-span-2">
                    <x-label for="company_description" :required="true">Company Description</x-label>
                    <x-text-input name="company_description" type="textarea"
                        value="{{ $employer->company_description }}" />
                </div>

                <div class="col-span-2">
                    <x-label for="num_of_employee" :required="true">Number of Employee</x-label>
                    <x-text-input name="num_of_employee" type="text" value="{{ $employer->num_of_employee }}" />
                </div>

                <div class="col-span-2">
                    <x-label for="industry" :required="true">Industry</x-label>
                    <x-dropdown name='industry_id' :options="$industries" model="Industry" :mType="'industry'"
                        :selected="$industry" />
                </div>
                <div class="">

                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                        for="multiple_files">Upload multiple files</label>
                    <input
                        class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                        id="multiple_files" type="file" name="upload_url[]" multiple>


                </div>




                {{-- <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="multiple_files">Upload
                    multiple files</label>
                <i class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                    id="multiple_files" type="file[]" name="upload_url" multiple>
 --}}







                {{-- <div class="grid grid-rows-2 mb-2 gap-4 text-start">
                        <input
                            class="inline-block text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                            id="large_size" type="file" name="upload_url">
                        </div> --}}
                {{-- <x-button class="w-full">Upload</x-button> --}}
                {{-- </form> --}}

            </div>
            <div class="col-span-2">
                <x-button type="submit" class="w-full">Update </x-button>
            </div>

        </form>
    </x-card>
</x-layout>
