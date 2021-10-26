<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDiagnoseOrderTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('diagnose_order', function (Blueprint $table) {
      $table->id();
      $table->foreignId('diagnose_id')->constrained();
      $table->foreignId('order_id')->constrained();
      $table->boolean('decision')->default(0);
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
    Schema::dropIfExists('diagnose_order');
  }
}
