<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //

    protected $fillable = ['name', 'price', 'category_id', 'product_description_id'];
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function Category()
    {
        return $this->belongsTo('App\Category');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function Orders()
    {
        return $this->hasMany('App\Order');
    }

    public function ProductDescriptions()
    {
        return $this->hasOne('App\ProductDescriptions');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function ProductOptions()
    {
        return $this->hasMany('App\ProductOption');
    }

    public function scopeGetActive($query)
    {
        return $query->with('Images')->with('Category')->paginate(5);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\MorphMany
     */
    public function Images()
    {
        return $this->morphMany('App\Image', 'image');
    }

    public function User()
    {
        return $this->belongsTo('App\User');
    }
}
