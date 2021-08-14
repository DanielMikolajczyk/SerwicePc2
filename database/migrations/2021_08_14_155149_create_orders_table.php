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
          $table->id();
          $table->foreignId('client_id')->constrained();
          $table->unsignedBigInteger('status_id');
          $table->foreignId('order_type_id')->constrained();
          $table->string('serial_number');
          $table->string('part_number');
          $table->string('code');
          $table->string('manufacturer')->nullable();
          $table->string('model');
          $table->boolean('paid');
          $table->timestamps();

          $table->foreign('status_id')->references('id')->on('order_statuses');
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
