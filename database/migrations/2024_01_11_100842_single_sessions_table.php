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
        Schema::create('single_sessions', function (Blueprint $table) {
            $table->uuid('id')->primary();
            // relationship
            $table->foreignUuid('teacher_id')->references('id')->on('teachers');
            $table->foreignUuid('student_id')->references('id')->on('students');
            $table->enum('status', ['request', 'accept','reject', 'in progress', 'completed']);
            $table->integer('progress')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('single_sessions');
    }
};
