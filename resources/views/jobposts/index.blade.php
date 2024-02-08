<x-layout>
    <x-breadcrumb :links="['My Jobs' => '#']" class="mb-4" />
    <div class="mx-10 mb-8 text-right">
        <x-link-button href="{{ route('jobposts.create') }}"
            class="bg-orange-400 hover:bg-slate-100 text-black hover:text-orange-800">
            Add New
        </x-link-button>
    </div>
    <div class="mx-20">
        @forelse ($jobposts as $jobpost)
            <x-job-card :jobpost="$jobpost">

                <div class="pt-2 flex items-center justify-between space-x-2">
                    <div class=" flex items-center space-x-4">
                        <x-link-button href="{{ route('jobposts.edit', $jobpost) }}">
                            Edit
                        </x-link-button>
                        <form action="{{ route('jobposts.destroy', $jobpost) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <x-button class="bg-red-600" onclick="return confirmDelete()">Delete</x-button>
                        </form>
                    </div>

                    <div>
                        <x-link-button :href="route('myjob_applications.show', $jobpost)" class="bg-cyan-400">
                            Job Applied Views
                        </x-link-button>
                    </div>
                    <div>
                        <x-link-button :href="route('jobposts.show', $jobpost)" class="bg-cyan-400">
                            Show Details
                        </x-link-button>
                    </div>
                </div>

            </x-job-card>
        @empty
            <div class="rounded-md border border-dashed border-slate-300 p-8">
                <div class="text-center font-medium">
                    No job posts yet!
                </div>
                <div class="text-center">
                    Post your first job <a class="text-indigo-500 hover:underline"
                        href="{{ route('jobposts.create') }}">here!</a>
                </div>
            </div>
        @endforelse
    </div>
</x-layout>
