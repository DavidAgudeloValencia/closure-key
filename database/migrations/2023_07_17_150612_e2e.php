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
        //End to End encryption
        Schema::create('e2e', function (Blueprint $table) {
            $table->id();
            $table->foreignId('emitter_key')->nullable()->index();
            $table->foreignId('receiver_key')->nullable()->index();
            $table->boolean('encrypted_message');
            $table->timestamps();

            $table->unique(['emitter_key', 'receiver_key']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('e2e');
    }
};
