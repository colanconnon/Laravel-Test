<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductOptions extends Model
{
    //
    protected $fillable = ['name', 'description'];
    public function Products()
    {
        return $this->belongsTo('App\Products');
    }

    protected $table = "ProductOptions";
}
