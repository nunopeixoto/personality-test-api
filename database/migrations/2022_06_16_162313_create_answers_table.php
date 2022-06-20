<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('answers', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('question_id')->nullable(false)->unsigned()->index();
            $table->foreign('question_id')->references('id')->on('questions')->onDelete('cascade');
            $table->string('answer', 255);
            $table->boolean('introvert_score')->nullable(false)->comment('0 - Not introvert; 1 - Introvert');
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
        Schema::dropIfExists('answers');
    }
};
