<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBlooddistrictsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blooddistricts', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('division_id')->unsigned();
            
            $table->foreign('division_id')->references('id')->on('blooddivisions');
            $table->string('name');
            $table->string('bn_name');
            $table->double('lat');
            $table->double('lon');
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
        Schema::drop('blooddistricts');
    }
}
