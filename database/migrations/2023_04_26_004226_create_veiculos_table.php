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
            Schema::create('veiculos', function (Blueprint $table) {
                $table->id();
    
                $table->string('chassi');
                $table->string('placa', 7)->unique();
                $table->string('renavam');
                $table->string('marca');
                $table->string('modelo');
                $table->decimal('valor_compra', 10, 2);
    
                $table->unsignedBigInteger('empresa_id');
                $table->foreign('empresa_id')->references('id')->on('empresas');
    
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
        Schema::dropIfExists('veiculos');
    }
};
