<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddDefaultToPartnerfields extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('partnerfields', function(Blueprint $table)
		{
			 $table->string('default', 100)
                   ->nullable()
                   ->after('rx_faker_type');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('partnerfields', function(Blueprint $table)
		{
			$table->dropColumn('default');
		});
	}
}
