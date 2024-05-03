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
        Schema::create('monthwise_salaries', function (Blueprint $table) {
            $table->id();
            $table->integer('admin_id');
            $table->integer('school_id');
            $table->integer('staff_id');
            $table->integer('staff_member_id');
            $table->string('staff_type');
            $table->string('salary_month');
            $table->float('salary');
            $table->float('medical_allowance');
            $table->float('providant_fund');
            $table->float('employee_tax');
            $table->float('bonus');
            $table->float('transportation_allow');
            $table->float('total');
            $table->float('total_dedunction');
            $table->float('total_paid');
            $table->string('fsd');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('monthwise_salaries');
    }
};
