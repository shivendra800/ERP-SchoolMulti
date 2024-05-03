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
        Schema::create('upload_contents', function (Blueprint $table) {
            $table->id();
            $table->integer('admin_id');
            $table->integer('school_id');
            $table->integer('teacher_id');
            $table->integer('class_id');
            $table->integer('subject_id');
            $table->integer('unit_id');
            $table->text('topic_name');
            $table->text('upload_note');
            $table->tinyInteger('status')->default('1');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('upload_contents');
    }
};
