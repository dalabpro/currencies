<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCurrencyObjectTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('currency_object', function (Blueprint $table) {
            $table->unsignedInteger('currency_id');
            $table->unsignedInteger('object_id');
            $table->integer('price')->default(0);
            $table->integer('price_old')->default(0);
            $table->integer('price_day')->default(0);
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
        Schema::dropIfExists('currency_object');
    }
}
