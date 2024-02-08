<x-dashboard>

@section('table')
<x-table :headers="['Common ID', 'Details', 'Date', 'Action']" 
        :rows="$commons->map(function($common) {
             return [
               'no' => $common->id,                
                 'city_name' => $common->details,                
                 'date' => $common->updated_at->format('d-m-Y')
             ];
        })">       
</x-table>

<x-pagination-buttons :paginator="$commons" />

@endsection

</x-dashboard>

 