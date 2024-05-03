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
        Schema::create('decide_class_periods', function (Blueprint $table) {
            $table->id();
            $table->integer('admin_id');
            $table->integer('school_id');
            $table->integer('year_id');
            $table->integer('week_days');
            $table->integer('class_id');
            $table->integer('stream_id')->nullable();
            $table->integer('Section_id')->nullable();
            $table->string('room_no');
            $table->string('class_period');
            $table->integer('teacher_id')->nullable();
            $table->integer('subject_id')->nullable();
            $table->string('class_start_time')->nullable();
            $table->string('class_end_time')->nullable();
            $table->tinyInteger('status')->default('1');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('decide_class_periods');
    }
};
