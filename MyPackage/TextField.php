<?php
/**
 * Created by PhpStorm.
 * User: colanconnan
 * Date: 8/17/16
 * Time: 11:17 AM
 */

namespace MyPackage;


use Illuminate\Support\Facades\View;

class TextField
{
    public static function render($name, $value, $options)
    {
        $view = View::make('MyPackage::TextField', ['name' => $name, 'value' => $value, 'options' => $options]);
        $viewData = (string) $view;
        return $viewData;
    }
}