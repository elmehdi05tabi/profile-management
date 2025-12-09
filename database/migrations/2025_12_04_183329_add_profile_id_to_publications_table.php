<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    // RolationShips
    /*
    one to one 
    one to many
    one to many inversed / belogn to
    mant to many 
    */
    {
   Schema::table('publications', function (Blueprint $table) {
    $table->unsignedBigInteger('profiles_id');
    $table->foreign('profiles_id')
          ->references('id')
          ->on('profiles')
          ->onDelete('cascade'); // important
});

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('publications', function (Blueprint $table) {
            $table->dropColumn("profiles_id") ;
        });
    }
};
