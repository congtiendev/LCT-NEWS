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
            $table->string("fullname", 255);
            $table->string('username', 50)->unique();
            $table->string('password', 255);
            $table->string('email', 255)->unique();
            $table->string('phone', 10)->unique();
            $table->date('birthday')->nullable();
            $table->string('address', 255)->nullable();
            $table->string('avatar', 255)->nullable();
            $table->tinyInteger('gender')->default(0);
            $table->tinyInteger('role')->default(0);
            $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes('deleted_at', 0);
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
