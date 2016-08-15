@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="col-md-8">
            <h1>Create Product</h1>
            <br />
            <br />

            {!! Form::model($product = new \App\Product, ['url' => 'product']) !!}
            <div class="form-group">
                {!! Form::label('name', 'Name: ') !!}
                {!! Form::text('name', null, ['class' => 'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('price', 'Price: ') !!}
                {!! Form::text('price', null, ['class' => 'form-control']) !!}
            </div>

            <input type="submit" value="Create Product" id="CreateProduct" class="btn btn-primary" />
            {!! Form::close() !!}
        </div>
    </div>
@stop