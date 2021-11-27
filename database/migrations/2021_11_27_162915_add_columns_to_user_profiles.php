<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnsToUserProfiles extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('user_profiles', function (Blueprint $table) {
            //
            $table->dropColumn('permanent_address');
            $table->dropColumn('temporary_address');
            $table->string('p_vill');
            $table->string('p_po');
            $table->string('p_building_no');
            $table->string('p_flat_no');
            $table->string('p_tech');
            $table->string('p_dist');
            $table->string('p_state');
            $table->string('p_pin');
            $table->string('t_vill');
            $table->string('t_po');
            $table->string('t_building_no');
            $table->string('t_flat_no');
            $table->string('t_nearby');
            $table->string('t_tech');
            $table->string('t_dist');
            $table->string('t_state');
            $table->string('t_pin');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('user_profiles', function (Blueprint $table) {
            //
        });
    }
}
