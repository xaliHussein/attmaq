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
        Schema::create('students', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('name');
            $table->string('phone')->unique();
            $table->string('zipcode');
            $table->string('password');
            $table->integer('age');
            $table->string('gender');
            $table->string('otp');
            $table->string('image')->nullable();
            $table->string('country');
            $table->string('city');
            $table->string('main_language')->default("عربي");
            $table->boolean('is_active')->default(true);
            $table->boolean('account_status')->default(false); // 0  inactive 1 active
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
