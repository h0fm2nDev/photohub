<?php

namespace App;

use App\Project;
use App\User;
use Illuminate\Database\Eloquent\Model;

class Portfolio extends Model
{
    protected $fillable = [
        'title',
        'description'
    ];

    public function user() 
    {
        return $this->belongsTo(User::class, 'id');
    }

    public function project()
    {
        return $this->hasMany(Project::class);
    }
}
