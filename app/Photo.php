<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Gallery;

class Photo extends Model
{
    public function gallery()
    {
        return $this->belongsTo(Gallery::class, 'id');
    }
}
