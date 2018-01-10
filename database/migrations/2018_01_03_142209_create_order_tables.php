<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        for ($i = 0; $i < 10; $i++) {
            Schema::connection('mysql_' . sprintf('%02d', $i))->create('user_order_' . sprintf('%02d', $i), function (Blueprint $table) {
                $table->bigIncrements('id');
                $table->unsignedInteger('user_id')->comment('用户id');
                $table->string('order_no', 50)->comment('订单id');
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
            Schema::dropIfExists('user_order_' . sprintf('%02d', $i));
        }
    }
}
