<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class CreateEmpresasTable.
 */
class CreateEmpresasTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('empresas', function(Blueprint $table) {
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
		Schema::drop('empresas');
	}
}
