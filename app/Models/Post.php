<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\Request;

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
        return $this->belongsTo(Admin::class, 'admin_id');
    }

    public function category() : BelongsTo
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function getCreatedAtAttribute($date) : string
    {
        return Carbon::parse($date)->diffForHumans();
    }

    public function scopeFilter($query, array $filters) : void
    {
        $query->when($filters['search'] ?? false, function ($query, $search)
        {
            return $query->where(
                function ($query) use ($search)
                {
                    return $query->where('title', 'like', '%'.$search.'%');
                }
            );
        });

        $query->when($filters['category'] ?? false, function ($query, $category)
            {
                return $query->whereHas('category',
                    function ($query) use ($category)
                    {
                        return $query->where('name', $category);
                    }
                );
            });
    }
}
//->latest()
//    ->paginate(12)
//    ->withQueryString(),
