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
        //Posts 
        Schema::create('post_threads', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable();
            $table->longText('content');
            $table->string('file_content')->nullable();
            $table->timestamp('delete_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('post_threads');
    }
};
