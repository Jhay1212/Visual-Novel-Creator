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
        Schema::create('scenes', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('games_id');
            $table->string('name')->default('Untitled');
            $table->string('background')->default('defaultscene.jpg');
            $table->integer('positionX');
            $table->integer('positionY');
            $table->string('custom_data');
            $table->timestamps();

            $table->foreign('games_id')->references('id')->on('games')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('scenes');
    }
};
