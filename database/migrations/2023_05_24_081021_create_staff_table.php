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
        Schema::create('staff', function (Blueprint $table) {
            $table->id();
            $table->integer('admin_id');
            $table->string('staff_member_id');
            $table->integer('school_id');
            $table->string('reg_no');
            $table->string('email')->unique();
            $table->string('name');
            $table->string('mobile');
            $table->string('e_dob');
            $table->string('e_gender');
            $table->text('complete_address');
            $table->string('e_pincode');
            $table->string('e_joining_date');
            $table->string('e_image');
            $table->string('experience');
            $table->string('aadhar');
            $table->integer('account_no');
            $table->string('acc_hold_name');
            $table->string('ifsc_code');
            $table->string('bank_name');
            $table->tinyInteger('status')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('staff');
    }
};
