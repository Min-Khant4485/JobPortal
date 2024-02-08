<x-layout>
    <div class="container border m-1 bg-slate-200">
        <h3 class=" mx-4 text-2xl text-slate-950 font-semibold mt-1">{{ auth()->user()->first_name }}
            {{ auth()->user()->middle_name }}
            {{ auth()->user()->last_name }}'s Applied Applications
        </h3>
        <div class="mb-1 mt-1 ml-4 mr-2">
            @foreach ($jobapplications as $jobapplication)
                <div>
                    <x-job-application-card :$jobapplication>
                        <div class=" flex justify-between pt-2">
                            <form action="{{ route('job_hunts.destroy', $jobapplication) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <x-button class=" bg-red-600">Delete</x-button>
                            </form>
                            {{-- <input type="hidden" name="job_post_id" value="{{ $jobpost->id }}"> --}}

                            <div class=" text-right">
                                <x-button class=" bg-green-700 text-white"><i class="fa-regular fa-circle-check"></i>
                                    {{ App\Models\Common::find($jobapplication->appl_status)->details }}</x-button>
                            </div>
                        </div>
                    </x-job-application-card>
                </div>
            @endforeach
        </div>
    </div>
</x-layout>
