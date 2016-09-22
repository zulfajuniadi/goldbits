<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('code');
            $table->string('url');
            $table->date('expiry_date');
            $table->text('pricing_reason', 10, 2)->nullable();
            $table->integer('quantity')->default(1000);
            $table->decimal('weekly_sales', 10, 2)->default(100);
            $table->decimal('price', 10, 2)->nullable();
            $table->decimal('low_price', 10, 2);
            $table->decimal('mid_price', 10, 2);
            $table->decimal('high_price', 10, 2);
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
        Schema::dropIfExists('products');
    }
}
