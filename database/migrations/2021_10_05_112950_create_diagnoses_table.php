<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDiagnosesTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('diagnoses', function (Blueprint $table) {
      $table->id();
      $table->unsignedBigInteger('type_id');
      $table->string('name');
      $table->text('description');
      $table->integer('price');
      $table->timestamps();

      $table->foreign('type_id')->references('id')->on('order_types');
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    Schema::dropIfExists('diagnoses');
  }
}
