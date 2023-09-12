<?php

use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('user_statistics', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(User::class);
            $table->tinyInteger(column: 'days_participated');
            $table->bigInteger(column: 'total_likes', unsigned: true);
            $table->bigInteger(column: 'total_views', unsigned: true);
            $table->bigInteger(column: 'total_replies', unsigned: true);
            $table->tinyInteger(column: 'max_streak', unsigned: true)->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_statistics');
    }
};
