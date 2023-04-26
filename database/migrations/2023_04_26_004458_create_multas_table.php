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
        if (!Schema::hasTable('multas')) 
        {
            Schema::create('multas', function (Blueprint $table) {
                $table->id();
    
                $table->string('descricao');
                $table->string('orgao');
                $table->decimal('valor', 10, 2);
                $table->boolean('quitacao');
                $table->timestamp('quitacao_data_hora')->nullable();
    
                $table->unsignedBigInteger('veiculo_id');
                $table->foreign('veiculo_id')->references('id')->on('veiculos');
    
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
        Schema::dropIfExists('multas');
    }
};
