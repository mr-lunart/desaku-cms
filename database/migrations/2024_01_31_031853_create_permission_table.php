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
        Schema::create('permission', function (Blueprint $table) {
            $table->id('no');
            $table->string('id_admin', 32)->unique()->nullable();
            $table->boolean('showDashboard');
            $table->boolean('showEditor');
            $table->boolean('showMasterdata');
            $table->boolean('showWebconfig');
            $table->boolean('showAppearance');
            $table->boolean('showWebreport');
            $table->boolean('showGallery');
            $table->boolean('showComment');
            $table->boolean('showAdminManajer');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('permission');
    }
};
