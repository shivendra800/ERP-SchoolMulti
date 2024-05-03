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
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->integer('admin_id');
            $table->integer('school_id');
            $table->string('reg_no');
            $table->string('student_id');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('s_name');
            $table->string('s_dob');
            $table->string('s_gender');
            $table->string('s_category');
            $table->string('s_relision');
            $table->text('s_address');
            $table->string('s_state');
            $table->string('s_city');
            $table->string('s_area');
            $table->string('s_pincode');
            $table->string('s_addmission_date');
            $table->string('current_fsd');
            $table->string('blood_group');
            $table->string('father_name');
            $table->string('mother_name');
            $table->string('father_occu');
            $table->string('mother_occu');
            $table->text('p_address');
            $table->string('f_mobile_no');
            $table->string('m_mobile_no');
            $table->string('stream');
            $table->string('section');
            $table->string('class');
            $table->string('passsed_year');
            $table->string('passsed_class');
            $table->string('passsed_school_name');
            $table->string('passsed_marks');
            $table->string('passsed_percentage');
            $table->string('stu_image');
            $table->tinyInteger('status')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
