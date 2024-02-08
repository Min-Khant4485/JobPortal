<x-dashboard>

@section('table')
  <x-table :headers="['Industry ID', 'Industry', 'Date', 'Action']" 
          :rows="$industries->map(function($industry) {
              return [
                'no' => $industry->id,                
                  'industry_name' => $industry->industry_name,                
                  'date' => $industry->updated_at->format('d-m-Y')
              ];
          })">       
  </x-table>

  <x-pagination-buttons :paginator="$industries" />
@endsection

</x-dashboard>