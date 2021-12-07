<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Post extends Model
{
    use HasFactory;
    protected $with = ['comments', 'admin', 'category'];

    public function comments() : HasMany
    {
        return $this->hasMany(Comment::class, 'post_id');
    }

    public function admin() : BelongsTo
    {
        return $this->belongsTo(Admin::class, 'admin');
    }

    public function category() : BelongsTo
    {
        return $this->belongsTo(Category::class, 'category');
    }

    public function getCreatedAtAttribute($date) : string
    {
        return Carbon::parse($date)->diffForHumans();
    }
}
