<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class InitDatabase extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $file = realpath(__DIR__ . '/../dump.sql');
        DB::unprepared(file_get_contents($file));
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        foreach (\DB::select('SHOW TABLES') as $table) {
            $table_array = get_object_vars($table);
            if($table_array[key($table_array)] != 'migrations') {
                \Schema::drop($table_array[key($table_array)]);
            }
        }
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}
