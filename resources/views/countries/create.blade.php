<x-dashboard>

    @section('table')
        <h3 class=" text-lg text-bold font-bold">Creating New Country</h3>
        <form action="{{ route('countries.store') }}" method="POST">
            @csrf
            <div class="mb-5 mt-4">
                <x-label for="country_name" :required="true">Country Name</x-label>
                <x-text-input name="country_name" class=" w-1/2 border rounded-md" />
            </div>

            <div>
                <x-button type="submit">Create</x-button>
            </div>
        </form>
    @endsection
</x-dashboard>
