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
        Schema::create('enrollments', function (Blueprint $table) {
            $table->bigInteger('id', true);
            $table->bigInteger('employee_id')->nullable()->index('employee_id');
            $table->bigInteger('course_id')->nullable()->index('course_id');
            $table->decimal('progress', 5)->nullable()->default(0);
            $table->timestamp('enrollment_date')->nullable();
            $table->timestamp('completion_date')->nullable();
            $table->boolean('certificate_issued')->nullable()->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('enrollments');
    }
};
