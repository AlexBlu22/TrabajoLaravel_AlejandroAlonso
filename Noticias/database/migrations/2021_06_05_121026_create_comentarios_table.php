<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateComentariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comentarios', function (Blueprint $table) {
            // ID
            $table->id();
            //
            $table->string('comentario');
            //Noticia_ID
            $table->unsignedBigInteger('noticia_id')->nullable();

            // ==================================================== //

            $table->timestamps();

            //Noticias_ID -> ID de noticias
            $table->foreign('noticia_id')->references('id')->on('noticias');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('comentarios');
    }
}
