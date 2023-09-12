<?php

namespace App\Models\Tweet;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Statistics extends Model
{
    use HasFactory;

    protected $table = 'user_statistics';

    protected $fillable = [
        'user_id',
        'days_participated',
        'total_likes',
        'total_views',
        'total_replies',
        'max_streak',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
