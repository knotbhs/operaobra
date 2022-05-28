<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class CreateClientesTable.
 */
class CreateClientesTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('clientes', function(Blueprint $table) {
            $table->increments('id');
			$table->string('name');
			$table->string('cnpj', 14)->nullable();
			$table->string('email')->nullable();
			$table->string('telefone')->nullable();
			$table->json('endereco')->nullable();
			$table->text('obs')->nullable();
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
		Schema::drop('clientes');
	}
}
