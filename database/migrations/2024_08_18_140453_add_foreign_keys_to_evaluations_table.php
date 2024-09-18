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
        Schema::table('evaluations', function (Blueprint $table) {
            $table->foreign(['module_id'], 'evaluations_ibfk_1')->references(['id'])->on('modules')->onUpdate('no action')->onDelete('no action');
            $table->foreign(['course_id'], 'evaluations_ibfk_2')->references(['id'])->on('courses')->onUpdate('no action')->onDelete('no action');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('evaluations', function (Blueprint $table) {
            $table->dropForeign('evaluations_ibfk_1');
            $table->dropForeign('evaluations_ibfk_2');
        });
    }
};
