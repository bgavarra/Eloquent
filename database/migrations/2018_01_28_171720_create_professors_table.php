<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProfessorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('professors', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('credencial')->unique();
            $table->string('nome');
            $table->integer('disciplina');
            $table->integer('quantidade_turmas')->unsigned();
            $table->integer('total_alunos')->unsigned();;
            $table->integer('aprovados')->unsigned();
            $table->integer('horas_aula')->unsigned();
            $table->decimal('salario', 7, 2);
            $table->string('email');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('professors');
    }
}
