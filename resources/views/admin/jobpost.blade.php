<x-dashboard>

@section('table')
  <x-table :headers="['Job Post ID', 'Job Title', 'Company','Job Status', 'Closing Date', 'Action']" 
          :rows="$jobposts->map(function($jobpost) {
              return [
                'no' => $jobpost->id,                
                  'job_title' => $jobpost->job_title,
                  'company' => $user->company_name,
                  'job_status' => $jobpost->job_status,               
                  'closing_date' => $jobpost->closing_date->format('d-m-Y')
              ];
          })">       
  </x-table>

  <x-pagination-buttons :paginator="$jobposts" />
@endsection

</x-dashboard>