<?php

namespace App\Models;

use App\Enums\TweetMediaTypeEnum;
use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
    protected $table = 'tweet_medias';

    protected $fillable = [
        'media_type',
        'thumbnail',
        'payload'
    ];

    protected $casts = [
        'payload' => 'json',
        'media_type' => TweetMediaTypeEnum::class,
    ];
}
