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
            $table->string('name')->comment('имя пользователя');
            $table->string('email')->unique()->comment('почта пользователя');
            $table->string('password')->comment('Пароль');
            $table->boolean('is_admin')->default(false)->comment("является ли он админом");
            $table->boolean('is_email_confirm')->default(false)->comment('Подверждённый ли email');
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
