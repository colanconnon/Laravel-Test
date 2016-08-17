<?php
/**
 * Created by PhpStorm.
 * User: colanconnan
 * Date: 8/17/16
 * Time: 11:16 AM
 */

namespace MyPackage;


use Illuminate\Support\Facades\View;

class Dropdown
{
    public static function render($array, $selected)
    {
        $view = View::make('MyPackage::Dropdown', ['selectOptions' => $array, 'selected' => $selected]);
        $viewData = (string) $view;
        return $viewData;
    }
}