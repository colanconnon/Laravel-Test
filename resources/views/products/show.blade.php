@extends('layouts.app')

@section('content')
    <div class="container">
        <h3>Product Name: {{$product->name}}</h3>
        <p>Price: {{$product->price}}</p>
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