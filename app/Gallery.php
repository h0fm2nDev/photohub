<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Photo;

class Gallery extends Model
{
    protected $table = [
        'title'
    ];

    public function photos()
    {
        return $this->hasMany(Photo::class, 'gallery_id', 'id');
    }
}
