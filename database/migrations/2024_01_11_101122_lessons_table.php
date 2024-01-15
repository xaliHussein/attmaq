<?php

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
        Schema::create('lessons', function (Blueprint $table) {
            $table->uuid('id')->primary();

            // relationship
            $table->foreignUuid('course_id')->references('id')->on('courses');

            $table->string('title');
            $table->string('description');

            $table->string('link');


            // when teacher edit start time and end time
            // send notification to user that meeting will reschedule
            $table->time('start_time')->nullable();
            $table->time('end_time')->nullable();

            $table->enum('attendance',['attend','absent','late']);




            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lessons');
    }
};
