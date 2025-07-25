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
        Schema::create('connections', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('source_scene');
            $table->uuid('target_scene');
            $table->uuid('choice_id');
            $table->string('type')->nullable();
            $table->timestamps();

            $table->foreign('source_scene')->references('id')->on('scenes');
            $table->foreign('target_scene')->references('id')->on('scenes');
            $table->foreign('choice_id')->references('id')->on('choices');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('connections');
    }
};
