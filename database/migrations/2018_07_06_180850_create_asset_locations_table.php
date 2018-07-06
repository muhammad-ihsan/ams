<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAssetLocationsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('asset_locations', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('name');
			$table->string('location_id');
			$table->integer('offsetX');
			$table->integer('offsetY');
			// $table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('asset_locations');
	}

}
