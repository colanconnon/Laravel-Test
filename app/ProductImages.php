<?php
/**
 * Created by PhpStorm.
 * User: colanconnan
 * Date: 8/16/16
 * Time: 9:58 AM
 */

namespace App;


class ProductImages
{
    /**
     * @param $id
     * @return mixed
     */
    public function get($id)
    {
        return Product::find($id)->images()->first();
    }
}