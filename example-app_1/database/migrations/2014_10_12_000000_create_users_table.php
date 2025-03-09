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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('fullname', 50)->nullable();
            $table->string('phone', 50)->nullable();
            $table->string('address', 100)->nullable();
            $table->string('province_id', 100)->nullable();
            $table->string('district_id', 100)->nullable();
            $table->string('ward_id', 100)->nullable();
            $table->dateTime('birthday')->nullable();
            $table->string('image')->nullable();
            $table->string('description')->nullable();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
