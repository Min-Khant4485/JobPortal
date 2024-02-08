<?php

use App\Models\City;
use App\Models\Common;
use App\Models\Employer;
use App\Models\JobPost;
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
        Schema::create('job_posts', function (Blueprint $table) {
            $table->id();

            $table->foreignIdFor(Employer::class);
            $table->foreignIdFor(City::class);
            $table->string('job_title');
            $table->string('description');
            $table->string('requirement');
            // $table->integer('currency');
            $table->integer('salary');
            // $table->integer('job_type');
            $table->date('closing_date');

            $table->foreignIdFor(Common::class, 'job_type'); // First foreign key
            $table->foreignIdFor(Common::class, 'currency'); // Second foreign key
            $table->foreignIdFor(Common::class, 'job_status');
            // $table->unsignedBigInteger(Common::class);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('job_posts');
    }
};
