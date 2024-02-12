<x-dashboard>

    @section('table')
        <a href="{{ route('countries.create') }}">Create Country</a>
        <x-table :headers="['Country ID', 'Country', 'Date', 'Action']" :rows="$countries->map(function ($country) {
            return [
                // place the desired column here
                'no' => $country->id,
                'country_name' => $country->country_name,
                'date' => $country->updated_at->format('d-m-Y'),
            ];
        })">
        </x-table>

        <x-pagination-buttons :paginator="$countries" />
    @endsection

</x-dashboard>
