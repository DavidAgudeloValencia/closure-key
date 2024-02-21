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
        //comments 
        Schema::create('comments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('post_thread_id')->nullable();
            $table->foreignId('user_id')->nullable();
            $table->longText('content');
            $table->string('file_content');
            $table->timestamp('delete_at')->nullable();
            $table->timestamps();
            

            $table->unique(['post_thread_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('comments');
    }
};
