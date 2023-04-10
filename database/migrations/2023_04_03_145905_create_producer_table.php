<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProducerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        /*
         * Création de la table des producteurs
         * On insère une clef étrangère pour assurer l'association avec la table `users`
         */
        Schema::create('producers', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreign('id')->references('id')->on('users');
        });

        /*
         * Insertion de la clef étrangère
         */
        Schema::table('basket_types', function (Blueprint $table) {
            $table->unsignedBigInteger('producer_id')->nullable();
//            $table->foreign('producer_id')->references('id')->on('producer');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('producer');
    }
}
