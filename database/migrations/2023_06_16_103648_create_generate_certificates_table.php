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
        Schema::create('generate_certificates', function (Blueprint $table) {
            $table->id();
            $table->integer('admin_id');
            $table->integer('school_id');
            $table->integer('year_id');
            $table->string('certificate_name');
            $table->string('part_name');
            $table->string('content');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('generate_certificates');
    }
};
