<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterTableCompanyMakeSmtpFieldsNullable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('company', function (Blueprint $table) {
            $table->string('smtp_host', 255)->nullable()->change();
            $table->string('smtp_user', 255)->nullable()->change();
            $table->string('smtp_password', 255)->nullable()->change();
            $table->string('smtp_port', 10)->nullable()->change();
            $table->string('smtp_secure', 10)->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('company', function (Blueprint $table) {
            $table->string('smtp_host', 255)->nullable(false)->change();
            $table->string('smtp_user', 255)->nullable(false)->change();
            $table->string('smtp_password', 255)->nullable(false)->change();
            $table->string('smtp_port', 10)->nullable(false)->change();
            $table->string('smtp_secure', 10)->nullable(false)->change();
        });
    }
}
