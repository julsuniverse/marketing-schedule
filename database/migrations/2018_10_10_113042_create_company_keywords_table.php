<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompanyKeywordsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('company_keywords', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('company_id');
            $table->integer('keyword_id')->unsigned();
            $table->integer('month');
            $table->integer('year');
            $table->timestamps();
        });

        Schema::table('company_keywords', function (Blueprint $table) {
            $table->foreign('company_id')->references('id')->on('company');
            $table->foreign('keyword_id')->references('id')->on('keywords');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('company_keywords', function (Blueprint $table) {
            $table->dropForeign(['company_id']);
            $table->dropForeign(['keyword_id']);
        });
        Schema::dropIfExists('company_keywords');
    }
}
