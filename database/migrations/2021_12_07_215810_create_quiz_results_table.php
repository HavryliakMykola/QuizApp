<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuizResultsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quiz_results', function (Blueprint $table) {
            $table->id('id');
            $table->integer('answer');
            $table->boolean('is_correct');
            $table->date('created');
            $table->unsignedBigInteger('quiz_id')->unsigned();
            $table->foreign('quiz_id')->references('id')->on('quizzes');
            $table->unsignedBigInteger('quiz_question_id')->unsigned();
            $table->foreign('quiz_question_id')->references('id')->on('quiz_questions');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('quiz_results');
    }
}
