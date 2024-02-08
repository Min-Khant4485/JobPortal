<?php

namespace App\Listeners;

use App\Events\JobSeekerViewed;
use App\Models\JobApplication;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class JobApplicationModelListener
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(JobSeekerViewed $event): void
    {
        $jobSeeker = $event->jobSeeker;

        // Your logic to update the other model's database based on $jobSeeker
        // ...

        // For example:
        $status = JobApplication::find($jobSeeker->id);

        $status->update(['status' => 'viewed']);
    }
}
