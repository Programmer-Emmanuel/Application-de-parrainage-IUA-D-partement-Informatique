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
        Schema::create('l1_g_i_s', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('matricule')->unique();
            $table->string('nom');
            $table->string('telephone')->unique()->nullable();
            $table->string('email')->unique()->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('l1_g_i_s');
    }
};
