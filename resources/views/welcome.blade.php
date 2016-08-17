@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Welcome</div>

                <div class="panel-body">
                    Your Application's Landing Page.
                    {!! MyPackage\Table::summary(['data' => ['1', '2', '3', '4'], 'data2' => ['a', 'b', 'c', 'd']], ['class' => 'table table-bordered table-condensed']) !!}
                    <br />
                    {!! MyPackage\Dropdown::render(['1' => "Value1", '2' => "Value2"], '2') !!}
                    <br />
                    <br />
                    {!! MyPackage\Link::render('Google.com', 'https://google.com',['class' => 'btn btn-primary']) !!}

                    <br />
                    <br />
                    {!! MyPackage\TextField::render('data', 'hello world', ["class" => "form-control", "id" => "data"]) !!}
                    <br />
                    <br />
                    {!! MyPackage\Label::render('Data: ', 'data', ["class" => "red"]) !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
