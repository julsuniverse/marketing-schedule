<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterTableDomainDeleteOfficeIdField extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('domain', function (Blueprint $table) {
            $table->dropForeign('fk_office_domain');
            $table->dropColumn('office_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('domain', function (Blueprint $table) {
            $table->integer('office_id')->nullable();
        });
        Schema::table('domain', function (Blueprint $table) {
            $table->foreign('office_id', 'fk_office_domain')
                ->references('id')->on('office')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });


    }
}
