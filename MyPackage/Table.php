<?php

namespace MyPackage {


    use Illuminate\Support\Facades\View;

    class Table
    {

        public static function summary($data, $options)
        {
            $view = View::make('MyPackage::table', ['tblData' => $data, 'options' => $options]);
            $viewData = (string) $view;
            return $viewData;
        }
    }
}