<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePartnerpagemapsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('partnerpagemaps', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('partnerpage_id')->unsigned()->nullable();
			$table->integer('partnerfield_id')->nullable();
			$table->integer('partner_id')->nullable();
			$table->string('partnerfield_fieldname', 100)->default('');
			$table->smallInteger('sequence')->unsigned()->nullable();
			$table->enum('fieldtype', array('text','select','radio','checkbox','textarea','hidden'))->default('text');
			$table->enum('required', array('Yes','No'))->default('No');
			$table->enum('autopopulated', array('Yes','No'))->nullable();
			$table->enum('static', array('Yes','No'))->default('No');
			$table->string('staticvalue', 1024)->nullable();
			$table->text('values', 65535)->nullable();
			$table->text('notes', 65535)->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('partnerpagemaps');
	}

}
