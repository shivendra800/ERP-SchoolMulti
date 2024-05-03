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
        Schema::create('update_f_s_d_s', function (Blueprint $table) {
            $table->id();
            $table->integer('admin_id');
            $table->integer('school_id');
            $table->string('fsd_start');
            $table->string('fsd_end');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('update_f_s_d_s');
    }
};
