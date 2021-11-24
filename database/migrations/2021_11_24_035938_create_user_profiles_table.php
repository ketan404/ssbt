<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_profiles', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id');
            $table->string('name');
            $table->string('s_o_d_o');
            $table->string('m_o');
            $table->date('date_of_birth');
            $table->string('father_name');
            $table->string('father_s_o');
            $table->string('father_m_o');
            $table->date('father_dob');
            $table->string('mother_name');
            $table->string('mother_d_o');
            $table->string('mother_m_o');
            $table->string('mother_husband');
            $table->date('mother_dob');
            $table->string('spouse_name');
            $table->string('spouse_d_o');
            $table->string('spouse_m_o');
            $table->string('spouse_husband');
            $table->date('spouse_dob');
            $table->string('permanent_address');
            $table->string('temporary_address');
            $table->string('mobile_no');
            $table->string('mobile_r')->nullable();
            $table->string('id_proof_no');
            $table->timestamps();
			$table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_profiles');
    }
}
