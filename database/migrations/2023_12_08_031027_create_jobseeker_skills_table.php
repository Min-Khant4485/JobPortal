<?php

use App\Models\JobSeeker;
use App\Models\SkillsSet;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('jobseeker_skills', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(JobSeeker::class)->constrained();
            $table->foreignIdFor(SkillsSet::class)->constrained();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jobseeker_skills');
    }
};
