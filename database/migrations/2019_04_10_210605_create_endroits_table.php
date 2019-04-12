<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEndroitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('endroits', function (Blueprint $table) {
            $table->increments('id');
            $table->string('logo');
            $table->string('nom_comercial');
            $table->string('adresse');
            $table->string('num_telephone');
            $table->integer('partenaire')->default(0);

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
        Schema::dropIfExists('endroits');
    }
}
