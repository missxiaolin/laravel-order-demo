<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShopTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        for ($i = 0; $i < 10; $i++) {
            Schema::connection('mysql_' . sprintf('%02d', $i))->create('shop_' . sprintf('%02d', $i), function (Blueprint $table) {
                $table->bigIncrements('id');
                $table->string('name', 50)->comment('门店名称');
                $table->string('address', 100)->comment('门店地址');
                $table->timestamps();
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
            Schema::dropIfExists('shop_' . sprintf('%02d', $i));
        }
    }
}
