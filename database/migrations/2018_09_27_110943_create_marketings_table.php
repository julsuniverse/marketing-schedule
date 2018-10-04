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
            $table->integer('company_id');
            $table->integer('traffic')->nullable();
            $table->integer('calls')->nullable();
            $table->integer('forms')->nullable();
            $table->integer('pages')->nullable();
            $table->integer('posts')->nullable();
            $table->integer('citations')->nullable();
            $table->integer('pr')->nullable();
            $table->integer('month');
            $table->integer('year');
            $table->timestamps();
        });

        Schema::table('marketings', function (Blueprint $table) {
            $table->index(['month']);
            $table->index(['year']);

            $table->foreign('company_id')
                ->references('id')->on('company')
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
        Schema::dropIfExists('marketings');
    }
}
