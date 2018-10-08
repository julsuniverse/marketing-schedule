<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterTableMarketingAddStatusFields extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('marketings', function (Blueprint $table) {
            $table->integer('pages_status')->default(0);
            $table->integer('posts_status')->default(0);
            $table->integer('citations_status')->default(0);
            $table->integer('pr_status')->default(0);
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
            $table->dropColumn('pages_status');
            $table->dropColumn('posts_status');
            $table->dropColumn('citations_status');
            $table->dropColumn('pr_status');
        });
    }
}
