<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    //
    protected $fillable = ['image_url'];
    public function image()
    {
        return $this->morphTo();
    }
}
