<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('user_id');
            $table->unsignedInteger('product_id');
            $table->unsignedInteger('prefecture_id')->nullable();
            $table->string('address');
            $table->decimal('temp_price');
            $table->decimal('sale_price')->default(0);
            $table->decimal('total_price');
            $table->tinyInteger('type');
            $table->tinyInteger('status');
            $table->tinyInteger('payment_type')->nullable();
            $table->tinyInteger('payment_status')->nullable();
            $table->timestamp('canceled_at')->nullable();
            $table->timestamp('payment_requested_at')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
