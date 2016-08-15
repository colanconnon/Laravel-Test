<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductOptions extends Model
{
    //

    public function Products()
    {
        return $this->belongsTo('App\Products');
    }

    protected $table = "ProductOptions";
}
