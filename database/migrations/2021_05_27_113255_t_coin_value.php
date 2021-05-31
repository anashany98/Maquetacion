<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TCoinValue extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('t_coin_value', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name_coin', 255);
            $table->string('symbol', 255);
            $table->decimal('price', $precision = 9, $scale = 2 );
            $table->boolean('active');
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
        Schema::dropIfExists('t_coin_value');
    }
}