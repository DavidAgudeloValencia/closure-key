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
        //Table relationships following
        Schema::create('relationships', function (Blueprint $table) {
            $table->id();
            $table->foreignId('follower_id')->nullable();
            $table->foreignId('followed_id')->nullable();
            $table->boolean('action');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('relationships');
    }
};
