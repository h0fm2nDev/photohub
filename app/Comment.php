<?php

namespace App;

use App\Ad;
use App\Project;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = [
        'title',
        'content'
    ];

    public function project() 
    {
        return $this->belongsTo(Project::class, 'id');
    }

    public function ad() 
    {
        return $this->belongsTo(Ad::class, 'id');
    }
}
