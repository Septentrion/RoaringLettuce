<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        /*
         * Modification de la table des utilisateurs
         * Intégration des colonnes supplémentaires pour le support de l'associaiton  polymorphe
         * (dont le nom est ici : `typeable`)
         */
        Schema::table('users', function (Blueprint $table) {
            $table->unsignedBigInteger('typeable_id');
            $table->string('typeable_type');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('client');
    }
}
