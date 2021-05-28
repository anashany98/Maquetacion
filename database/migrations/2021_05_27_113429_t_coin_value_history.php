<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TCoinValueHistory extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('t_coin_value_history', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name_coin', 255)->nullable(true);
            $table->decimal('price_now', 18)->nullable(true);
            $table->decimal('price_24h', 18)->nullable(true);
            $table->decimal('price_7days', 18)->nullable(true);
            $table->decimal('price_30days', 18)->nullable(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('t_coin_value_history');
    }
}