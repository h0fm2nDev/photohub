<?php

namespace App;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Town extends Model
{
    protected $fillable = [
        'name',
        'imgbg'
    ];

    public function users() 
    {
        return $this->hasMany(User::class, 'town_id', 'id');
    }
}
