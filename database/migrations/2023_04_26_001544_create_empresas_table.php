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
        if (!Schema::hasTable('veiculos')) 
        {
            Schema::create('empresas', function (Blueprint $table) {
                $table->id();
    
                $table->string('cnpj', 14)->unique();
                $table->string('razao_social');
                $table->string('endereco');
                $table->string('numero');
                $table->string('complemento')->nullable();
                $table->string('bairro');
                $table->string('cep');
                $table->string('telefone');
                $table->string('email');
    
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
        Schema::dropIfExists('empresas');
    }
};
