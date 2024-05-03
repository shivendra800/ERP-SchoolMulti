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
        Schema::create('leaves', function (Blueprint $table) {
            $table->id();
            $table->integer('admin_id');
            $table->integer('school_id');
            $table->integer('year_id');
            $table->string('type');
            $table->integer('student_id')->default(0);
            $table->integer('staff_id')->default(0);
            $table->integer('class_id')->nullable();
            $table->integer('stream_id')->nullable();
            $table->integer('section_id')->nullable();
            $table->string('leave_start_date');
            $table->string('leave_end_date');
            $table->string('leave_region');
            $table->tinyInteger('leave_status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('leaves');
    }
};
