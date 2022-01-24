<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('whatsapp')->nullable(); //191 caracteres por padrão
            $table->string('email_contato')->nullable(); //191 caracteres por padrão
            $table->string('titulo_site')->nullable(); //191 caracteres por padrão
            $table->tinyInteger('plano_id')->nullable(); //4 caracteres por padrão
            $table->dateTime('proximo_vencimento')->nullable(); //
            $table->dateTime('desativar_conta')->nullable(); //
            $table->dateTime('deletar_conta')->nullable(); //
            $table->tinyInteger('status_conta')->nullable()->default(1); //

            //softdeletes
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
        Schema::table('users', function (Blueprint $table) {
            //
        });
    }
}
