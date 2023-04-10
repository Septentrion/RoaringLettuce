<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDeliveryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        /*
         * Création de la table des livraisons
         */
        Schema::create('deliveries', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('address');
            $table->string('city');
            $table->dateTime('start_time');
            $table->datetime('end_time');
        });

        /*
         * Création delatable de liaison entre les producteurs et les livraisons
         */
        Schema::create('delivery_producer', function(Blueprint $table) {
            $table->unsignedBigInteger('producer_id');
            $table->unsignedBigInteger('delivery_id');
            $table->foreign('producer_id')->references('id')->on('producers');
            $table->foreign('delivery_id')->references('id')->on('deliveries');
        });

        /*
         * Création de la table de liaison entre les paniers et kes livraisons.
         */
        Schema::table('basket', function(Blueprint $table) {
            $table->unsignedBigInteger('delivery_id');
            $table->foreign('delivery_id')->references('id')->on('deliveries');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('delivery');
    }
}
