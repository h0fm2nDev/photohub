<?php

namespace App;

use App\User;
use App\Category;
use Illuminate\Database\Eloquent\Model;
use Spatie\Tags\Tag;

class Ad extends Model
{
    protected $fillable = [
        'title',
        'content'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class, 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'id');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class, 'ad_id', 'id');
    }
}
