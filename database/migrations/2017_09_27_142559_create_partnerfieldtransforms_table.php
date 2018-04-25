<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePartnerfieldtransformsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('partnerfieldtransforms', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('partnerid_left')->nullable();
			$table->integer('partnerid_right')->nullable();
			// $table->integer('partnerfield_id_left');
			$table->integer('partnerfield_id_left')->nullable();	// allowed nullable by alexei 4/25/2018
			$table->string('partnerfield_name_left', 100)->nullable();
			$table->integer('partnerfield_id_right');
			$table->string('partnerfield_name_right', 100)->nullable();
			$table->string('sanitizer', 100)->nullable();
			$table->text('transforms', 65535)->nullable();
			$table->integer('partnervaluemaps_id')->nullable();
			$table->string('default_if_empty', 100)->nullable();
			$table->string('hardcoded', 100)->nullable();
			$table->boolean('required')->nullable();
			$table->text('note', 65535)->nullable();
			$table->timestamps();
			$table->unique(['partnerfield_id_left','partnerfield_id_right'], 'partnerfield_id_left_2');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('partnerfieldtransforms');
	}

}
