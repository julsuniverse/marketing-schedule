<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMarketingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('marketings', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('company_office_id');
            $table->string('date');
            $table->integer('traffic');
            $table->integer('calls');
            $table->integer('forms');
            $table->integer('pages');
            $table->integer('posts');
            $table->integer('citations');
            $table->integer('pr');
            $table->timestamps();
        });

        Schema::table('marketings', function (Blueprint $table) {
            $table->foreign('company_office_id')
                ->references('id')->on('office')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('marketings', function (Blueprint $table) {
            $table->dropIndex(['company_office_id']);
        });

        Schema::dropIfExists('marketings');
    }
}
