<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGamesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('games', function (Blueprint $table) {

            $table->id()->comment('Id del juego');
            $table->string('name_game', 50)->unique()->default(NULL)->comment('Nombre del juego');
            $table->text('url_game')->default(NULL)->comment('Url del juego');
            $table->text('description_game')->nullable()->default(null)->comment('Descripción del Juego');
            $table->text('url_game_image')->default(null)->comment('Url de la imagen del juego');
            $table->unsignedBigInteger('status_game_id')->nullable()->comment('Estatus del juego');
            $table->timestamps();

            $table->foreign('status_game_id')->references('id')->on('status_game');

            $table->charset = 'utf8';
            $table->collation = 'utf8_unicode_ci';
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('games');
    }
}
