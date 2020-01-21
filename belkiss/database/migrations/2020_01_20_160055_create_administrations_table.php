<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAdministrationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('administrations', function(Blueprint $table)
        {
            $table->increments('id');
            $table->timestamps();
            $table->string('nom')->nullable();
            $table->string('tel')->nullable();
            $table->string('addresse')->nullable();
            $table->string('photo')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('administrations');
    }
}
