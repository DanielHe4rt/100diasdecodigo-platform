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
        Schema::create('tweets', function (Blueprint $table) {
            $table->id();
            $table->string('twitter_id');
            $table->string('tweet_id')->unique();

            $table->text('content');
            $table->integer('likes_count');
            $table->integer('replies_count');
            $table->integer('views_count');
            $table->timestamp('tweeted_at');
            $table->timestamps();

            $table->index(['twitter_id']);
            $table->index(['twitter_id', 'tweet_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tweets');
    }
};
