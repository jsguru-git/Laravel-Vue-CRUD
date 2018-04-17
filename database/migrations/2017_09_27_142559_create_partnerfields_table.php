<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePartnerfieldsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('partnerfields', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('partner_id');
			$table->string('fieldname', 100)->default('');
			$table->text('available_values', 65535)->nullable();
			$table->string('sanitizers', 100)->nullable();
			$table->string('validate', 100)->nullable();
			$table->string('rx_faker_type', 100)->nullable();
			$table->timestamps();
			$table->unique(['partner_id','fieldname'], 'partner_id');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('partnerfields');
	}

}
