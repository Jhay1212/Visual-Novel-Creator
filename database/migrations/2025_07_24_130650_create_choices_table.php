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
        Schema::create('choices', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('scene_id');
            $table->uuid('target_scene');
            $table->string('text');
            $table->unsignedInteger('order');
            $table->timestamps();

            $table->foreign('scene_id')->references('id')->on('scenes')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('choices');
    }
};
