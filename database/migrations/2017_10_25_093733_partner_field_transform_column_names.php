<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class PartnerFieldTransformColumnNames extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('partnerfieldtransforms', function(Blueprint $table) {
            $table->renameColumn('partnerid_left', 'partner_id_left');
            $table->renameColumn('partnerid_right', 'partner_id_right');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('partnerfieldtransforms', function(Blueprint $table) {
            $table->renameColumn('partner_id_left', 'partnerid_left');
            $table->renameColumn('partner_id_right', 'partnerid_right');
        });
    }
}
