<?php

use Illuminate\Database\Migrations\Migration; // Importa a classe Migration
use Illuminate\Database\Schema\Blueprint; // Importa a classe Blueprint
use Illuminate\Support\Facades\Schema; // Importa a fachada Schema

return new class extends Migration
{
    /**
     * Executa as migrações.
     *
     * @return void
     */
    public function up()
    {
        // Cria a tabela 'addresses' no banco de dados
        Schema::create('addresses', function (Blueprint $table) {
            $table->id(); 
            $table->string('cep'); 
            $table->string('logradouro'); 
            $table->string('bairro'); 
            $table->string('cidade'); 
            $table->string('estado'); 
            $table->timestamps(); 
        });
    }

    /**
     * Reverte as migrações.
     *
     * @return void
     */
    public function down()
    {
        // Remove a tabela 'addresses' do banco de dados
        Schema::dropIfExists('addresses');
    }
};
