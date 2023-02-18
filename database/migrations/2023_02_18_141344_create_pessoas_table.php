<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
  /**
   * Run the migrations.
   */
  public function up(): void
  {
    Schema::create('PESSOA', function (Blueprint $table) {
      $table->id('pes_id')->autoIncrement();
      $table->string('pes_nom');
      $table->dateTime('pes_datcad');
      $table->timestamps(); // created_at e updated_at
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::dropIfExists('PESSOA');
  }
};
