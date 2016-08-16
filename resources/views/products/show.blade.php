@extends('layouts.app')

@section('content')
    <div class="container">
        <h3>Product Name: {{$product->name}}</h3>
        <p>Price: {{$product->price}}</p>
        <br />
        {!! Form::model(null , ['method' => 'DELETE', 'action' => ['ProductController@destroy' , $product->id]]) !!}
        {{ csrf_field() }}


        <input type="submit" value="Delete Product" id="UpdateProduct" class="btn btn-primary" />
        {!! Form::close() !!}
        <br/>
        @unless(empty($product->Category))
            <p>
                Category: {{$product->Category->name}}
            </p>
        @endif

            @unless(empty($image->image_url))
                <p>
                    <img src="/images/{{$image->image_url}}" />
                </p>
                @endif
    </div>
@stop