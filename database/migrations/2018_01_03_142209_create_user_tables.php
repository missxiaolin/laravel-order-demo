<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        for ($i = 0; $i < 10; $i++) {
            Schema::connection('mysql_' . sprintf('%02d', $i))->create('user_' . sprintf('%02d', $i), function (Blueprint $table) {
                $table->bigIncrements('id');
                $table->unsignedInteger('user_id')->comment('用户');
                $table->string('open_id', 50)->comment('用户唯一标示');
                $table->timestamps();
                $table->unique('user_id');
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        for ($i = 0; $i < 10; $i++) {
            Schema::dropIfExists('user_' . sprintf('%02d', $i));
        }
    }
}
