<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('user_catalogue_language', function (Blueprint $table) {
            $table->unsignedBigInteger('user_catalogue_id');
            $table->unsignedBigInteger('language_id');
            $table->string('name');
            $table->string('canonical')->unique();
            $table->string('meta_title')->nullable();
            $table->string('meta_keyword')->nullable();
            $table->string('meta_description')->nullable();
            $table->integer('viewed')->default(0);
            $table->text('description')->nullable();
            $table->text('content')->nullable();
            $table->timestamps();
            $table->foreign('user_catalogue_id')->references('id')->on('user_catalogues')->onDelete('cascade');
            $table->foreign('language_id')->references('id')->on('languages')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('user_catalogue_language');
    }
}; 