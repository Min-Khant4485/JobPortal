<x-dashboard>

    <x-link-button href="{{ route('cities.create') }}">
        Create New City
    </x-link-button>
    @section('table')
        <x-table :headers="['City ID', 'City', 'Date', 'Action']" :rows="$cities->map(function ($city) {
            return [
                'no' => $city->id,
                'city_name' => $city->city_name,
                'date' => $city->updated_at->format('d-m-Y'),
            ];
        })">
        </x-table>

        <x-pagination-buttons :paginator="$cities" />
    @endsection
</x-dashboard>
