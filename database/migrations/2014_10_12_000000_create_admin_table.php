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
        Schema::create('admin', function (Blueprint $table) {
            $table->id('no');
            $table->string('id_admin', 32)->unique()->nullable();
            $table->string('username',64)->unique();
            $table->string('password',256);
            $table->rememberToken();
            $table->string('name',256);
            $table->timestamp('last_login_at')->nullable();
            $table->timestamps();
            $table->string('roles',24)->nullable();
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
