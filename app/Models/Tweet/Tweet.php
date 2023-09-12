<?php

namespace App\Models\Tweet;

use App\Models\Media;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Tweet extends Model
{
    use HasFactory;

    protected $table = 'tweets';

    protected $fillable = [
        'twitter_id',
        'tweet_id',
        'content',
        'likes_count',
        'replies_count',
        'views_count',
        'tweeted_at',
    ];

    protected $casts = [
        'tweeted_at' => 'datetime'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'twitter_id', 'twitter_id');
    }

    public function medias(): HasMany
    {
        return $this->hasMany(Media::class);
    }

}
