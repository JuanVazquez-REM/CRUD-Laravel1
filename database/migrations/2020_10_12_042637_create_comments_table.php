<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('post_id');
            $table->string('nombre');
            $table->unsignedBigInteger('persona_id');
            $table->text('contenido');
            $table->timestamps();

            $table->foreign('persona_id')->references('id')->on('personas')->onDelele('cascade');
            $table->foreign('post_id')->references('id')->on('posts')->onDelele('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('comments');
    }
}
