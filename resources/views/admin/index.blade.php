<x-dashboard>
    @section('statbar')
        @includeIf('components.statbar', ['admin' => App\Models\User::where(['role', 'System Admin'])])
    @endsection

    @section('chart')
        @includeIf('components.chart', ['admin' => App\Models\User::where(['role', 'System Admin'])])
    @endsection
</x-dashboard>
