<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableRespostas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('respostas')) {
            Schema::create('respostas', function (Blueprint $table) {
                $table->id();
                $table->integer('id_user')->unsigned();
                $table->integer('id_frase')->unsigned();
                $table->string('resposta');
                $table->integer('porcentagem_acerto')->default(0);
                $table->timestamps();
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('respostas');
    }
}
