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
        Schema::create('subscription_plan_histroys', function (Blueprint $table) {
            $table->id();
            $table->integer('admin_id');
            $table->integer('total_price');
            $table->integer('plan');
            $table->integer('per_std_price');
            $table->integer('total_stud');
            $table->integer('plan_start_date');
            $table->integer('plan_end_date');
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('subscription_plan_histroys');
    }
};
