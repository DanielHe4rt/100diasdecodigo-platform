<?php

use App\Models\Tweet\Tweet;
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
        Schema::create('tweet_medias', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Tweet::class);
            $table->string('media_type');
            $table->string('thumbnail');
            $table->text('payload');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tweet_medias');
    }
};
