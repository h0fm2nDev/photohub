<?php

namespace App;

use App\Ad;
use App\Project;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'name'
    ];

    public function projects()
    {
        return $this->hasMany(Project::class, 'category_id', 'id');
    }

    public function ads()
    {
        return $this->hasMany(Ad::class, 'ad_id', 'id');
    }
}
