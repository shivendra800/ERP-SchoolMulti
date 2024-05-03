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
        Schema::create('student_fees', function (Blueprint $table) {
            $table->id();
            $table->integer('admin_id');
            $table->integer('school_id');
            $table->integer('student_id');
            $table->integer('month_id');
            $table->string('fee_amount');
            $table->string('late_fee_charges');
            $table->string('total_fee_amount');
            $table->integer('class_id');
            $table->integer('stream_id');
            $table->integer('section_id');
            $table->integer('year_id');
            $table->string('fee_status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('student_fees');
    }
};
