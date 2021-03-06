<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //
    protected $fillable = ['name'];
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function Products()
    {
        return $this->hasMany('App\Product');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\MorphMany
     */
    public function Images()
    {
        return $this->morphMany('App\Image', 'image');
    }
}
