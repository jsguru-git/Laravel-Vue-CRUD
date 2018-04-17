<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePartnervaluemapsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('partnervaluemaps', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('name', 100)->nullable()->unique('name');
			$table->text('valuemap', 65535);
			$table->string('description', 100)->nullable();
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
		Schema::drop('partnervaluemaps');
	}

}
