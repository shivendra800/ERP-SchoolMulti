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
        Schema::create('school_registations', function (Blueprint $table) {
            $table->id();
            $table->integer('admin_id');
            $table->string('school_name');
            $table->date('fsd_start');
            $table->date('fsd_end');
            $table->string('principal_name');
            $table->string('mobile_no');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('logo_image');
            $table->tinyInteger('status')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('school_registations');
    }
};
