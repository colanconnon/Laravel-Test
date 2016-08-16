<?php
/**
 * Created by PhpStorm.
 * User: colanconnan
 * Date: 8/16/16
 * Time: 9:35 AM
 */

namespace App;


use Illuminate\Support\Facades\Facade;

class ProductImagesFacade extends Facade
{

        protected static function getFacadeAccessor()
        {
            return 'image';
        }
}