<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class GoogleFbLogin extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('users', function (Blueprint $table) {
	        $table->string('avatar')->after('profile_photo_path')->nullable();
			$table->string('provider', 20)->after('profile_photo_path')->nullable();
			$table->string('provider_id')->after('profile_photo_path')->nullable();
			$table->string('access_token')->after('profile_photo_path')->nullable();
		});
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
