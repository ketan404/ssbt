<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profiles', function (Blueprint $table) {
            $table->id();
		$table->string('parents_name')->nullable();
		$table->string('class')->nullable();
		$table->string('school')->nullable();
		$table->date('date_of_birth')->nullable();
		$table->string('city')->nullable();
		$table->string('parents_email')->nullable();
		$table->string('parents_mobile')->nullable();
		$table->unsignedBigInteger('user_id')->nullable();
		$table->foreign('user_id')->references('id')->on('users');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('profiles');
    }
}
