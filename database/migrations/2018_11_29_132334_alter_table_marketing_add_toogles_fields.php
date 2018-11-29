<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterTableMarketingAddTooglesFields extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('marketings', function (Blueprint $table) {
            $table->boolean('google_toogle')->default(0);
            $table->boolean('email_toogle')->default(0);
            $table->boolean('review_toogle')->default(0);
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
            $table->dropColumn('google_toogle');
            $table->dropColumn('email_toogle');
            $table->dropColumn('review_toogle');
        });
    }
}
