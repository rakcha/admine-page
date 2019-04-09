<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CatEndroit extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categorie_endroit', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('categorie_id')->unsigned();
           // $table->foreign('categorie_id')->references('id')->on('categories');
            $table->integer('endroit_id')->unsigned();
           // $table->foreign('endroit_id')->references('id')->on('endroits');
    
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
