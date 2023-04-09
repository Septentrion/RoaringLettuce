<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        /*
         * Création de la table des questions
         */
        Schema::create('questions', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('question');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
        });

        /*
         * Création de a table de liaison entre les questions et les réponses
         */
        Schema::table('answers', function (Blueprint $table) {
            $table->unsignedBigInteger('question_id');
            $table->foreign('question_id')->references('id')->on('questions');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('questions');
    }
}
