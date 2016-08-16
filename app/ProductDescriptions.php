<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductDescriptions extends Model
{
    //
    protected $fillable = ['description'];
    protected $table = "ProductDescriptions";
}
