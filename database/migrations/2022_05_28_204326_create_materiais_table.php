<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class CreateMateriaisTable.
 */
class CreateMateriaisTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('materiais', function(Blueprint $table) {
            $table->increments('id');
			$table->integer('orcamento_id')->unsigned();
			$table->string('name');
			$table->float('valor')->nullable();
			$table->text('descricao')->nullable();
            $table->timestamps();
			$table->foreign('orcamento_id')->references('id')->on('orcamentos');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('materiais');
	}
}
