<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdhesionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        /*
         * Création de la table des abonnements
         */
        Schema::create('adhesions', function (Blueprint $table) {
            $table->id();
            $table->timestamps(false);
            $table->dateTime('start_date');
            $table->dateTime('end_date');
            $table->string('type');
            $table->unsignedBigInteger('client_id');
            $table->foreign('client_id')->references('id')->on('clients');
            $table->unsignedBigInteger('basket_type_id');
            $table->foreign('basket_type_id')->references('id')->on('basket_types');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('adhesion');
    }
}
