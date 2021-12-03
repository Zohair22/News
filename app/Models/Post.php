<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Post extends Model
{
    use HasFactory;

    public function comments() : HasMany
    {
        return $this->hasMany(Comment::class, 'post');
    }

    public function getCreatedAtAttribute($date) : string
    {
        return Carbon::parse($date)->diffForHumans();
    }
}
