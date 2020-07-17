<?php

namespace App;

use App\Grade;
use App\Comment;
use App\Category;
use App\Portfolio;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = [
        'title',
        'description'
    ];

    public function portfolio() 
    {
        return $this->belongsTo(Portfolio::class, 'id');
    }

    public function category() 
    {
        return $this->belongsTo(Category::class);
    }

    public function comments() 
    {
        return $this->hasMany(Comment::class, 'project_id', 'id');
    }

    public function grade() 
    {
        return $this->hasOne(Grade::class, 'project_id', 'id');
    }
}
