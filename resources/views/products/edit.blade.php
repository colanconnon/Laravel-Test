@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="col-md-8">
            <h1>Edit Product</h1>
            <br />
            <br />
            @if(Session::has('product_update'))
                <p class="alert alert-success"> {{Session::get('product_update') }}</p>
            @endif
            {!! Form::model($product , ['method' => 'PUT', 'action' => ['ProductController@update' , $product->id]]) !!}
            {{ csrf_field() }}
            <div class="form-group">
                {!! Form::label('name', 'Name: ') !!}
                {!! Form::text('name', null, ['class' => 'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('price', 'Price: ') !!}
                {!! Form::text('price', null, ['class' => 'form-control']) !!}
            </div>

            <input type="submit" value="Update Product" id="UpdateProduct" class="btn btn-primary" />
            {!! Form::close() !!}
            @if ($errors->any())
                <br />
                <br />
                <div class="alert alert-danger">
                    @foreach ($errors->all() as $error)
                        <p>{{ $error }}</p>
                    @endforeach
                </div>
            @endif
        </div>

    </div>
@stop