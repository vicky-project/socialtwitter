<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
  public function up() {
    Schema::create('twitter_providers', function (Blueprint $table) {
      $table->id();
      $table->string('provider_id')->unique(); // ID dari Google
      $table->string('nickname')->nullable();
      $table->string('email')->nullable();
      $table->string('name')->nullable();
      $table->string('avatar')->nullable();
      $table->json('data')->nullable(); // data mentah
      $table->timestamps();
    });
  }

  public function down() {
    Schema::dropIfExists('twitter_providers');
  }
};