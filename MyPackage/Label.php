<?php
/**
 * Created by PhpStorm.
 * User: colanconnan
 * Date: 8/17/16
 * Time: 11:17 AM
 */

namespace MyPackage;


use Illuminate\Support\Facades\View;

class Label
{
    /**
     * @param $text
     * @param $labelFor
     * @param $options
     * @return string
     */
    public static function render($text, $labelFor, $options)
    {
        $view = View::make('MyPackage::Label', ['text' => $text, 'labelFor' => $labelFor, 'options' => $options]);
        $viewData = (string) $view;
        return $viewData;
    }
}