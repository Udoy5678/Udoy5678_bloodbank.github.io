<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBlooddonorsignUpsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blooddonorsign_ups', function (Blueprint $table) {
          
            $table->increments('id');
            $table->string('firstname');
            $table->string('lastname');
            $table->string('username');
            $table->unique('username');
            $table->string('email');
            $table->string('password');
            $table->string('gender');
            $table->string('birthday');
            $table->integer('division')->unsigned();
            $table->integer('district')->unsigned();
            $table->integer('location')->unsigned();
            $table->foreign('location')->references('id')->on('bloodlocations');
            $table->string('hospital');
            $table->string('phonenum');
            $table->unique('phonenum');
            
         
            
            
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
       
        Schema::drop('blooddonorsign_ups');
      
    }

}
