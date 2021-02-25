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
            $table->unsignedInteger('sub_categories_id')->nullable();
            $table->unsignedInteger('sale_id')->nullable();
            $table->string('name');
            $table->string('title');
            $table->text('detail');
            $table->decimal('price');
            $table->tinyInteger('is_hot');
            $table->tinyInteger('is_sale');
            $table->tinyInteger('is_special');
            $table->tinyInteger('is_show');
            $table->integer('number')->default(0);
            $table->tinyInteger('max_buy')->nullable();
            $table->integer('capacity');
            $table->tinyInteger('type');
            $table->timestamp('date');
            $table->string('country');
            $table->timestamps();
        });

        Schema::create('product_color', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('product_id');
            $table->unsignedInteger('color_id');
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
        Schema::dropIfExists('product_color');
    }
}
