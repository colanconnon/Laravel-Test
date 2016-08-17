<?php
/**
 * Created by PhpStorm.
 * User: colanconnan
 * Date: 8/17/16
 * Time: 11:16 AM
 */

namespace MyPackage;


use Illuminate\Support\Facades\View;

class Link
{
    public static function render($text, $target, $options)
    {
        $view = View::make('MyPackage::Link', ['text' => $text, 'target' => $target, 'options' => $options]);
        $viewData = (string) $view;
        return $viewData;
    }
}