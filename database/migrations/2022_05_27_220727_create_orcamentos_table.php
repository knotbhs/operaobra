<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class CreateOrcamentosTable.
 */
class CreateOrcamentosTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('orcamentos', function(Blueprint $table) {
            $table->increments('id');
			$table->integer('empresa_id')->unsigned();
			$table->integer('cliente_id')->unsigned();
			$table->date('data_inicio')->nullable();			
			$table->date('data_final')->nullable();				
			$table->date('data_garantia')->nullable();			
			$table->integer('etapa')->nullable();			
			$table->text('forma_pagamento')->nullable();		
			$table->json('endereco_obra')->nullable();			
			$table->foreign('empresa_id')->references('id')->on('empresas');
			$table->foreign('cliente_id')->references('id')->on('clientes');

            $table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('orcamentos');
	}
}
