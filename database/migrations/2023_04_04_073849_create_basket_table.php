<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBasketTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        /*
         * Création de la table des paniers
         */
        Schema::create('baskets', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('reference');
            $table->unsignedBigInteger('basket_type_id');
            $table->foreign('basket_type_id')->references('id')->on('basket_types');
        });

        /*
         * Création de la table de liaison entre les paniers et les produits
         */
        Schema::create('basket_product', function(Blueprint $table) {
            $table->unsignedBigInteger('product_id');
            $table->unsignedBigInteger('basket_id');
            $table->foreign('product_id')->references('id')->on('products');
            $table->foreign('basket_id')->references('id')->on('baskets');
        });

        /*
         * Création de la table de liaison entre les paniers et les clients
         * Cette table supporte une infortmation compléentaire indiquant si le client a bien reçu son panier (`checked`)
         */
        Schema::create('basket_client', function(Blueprint $table) {
            $table->unsignedBigInteger('client_id');
            $table->unsignedBigInteger('basket_id');
            $table->foreign('client_id')->references('id')->on('clients');
            $table->foreign('basket_id')->references('id')->on('baskets');
            $table->double('checked');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('basket');
    }
}
