<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompetitorPricesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('competitor_prices', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('competitor_id')->unsigned();
            $table->integer('product_id')->unsigned();
            $table->string('url');
            $table->decimal('price', 10, 2);
            $table->timestamps();

            $table->foreign('competitor_id')
                ->references('id')
                ->on('competitors')
                ->onDelete('cascade');

            $table->foreign('product_id')
                ->references('id')
                ->on('products')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('competitor_prices');
    }
}
