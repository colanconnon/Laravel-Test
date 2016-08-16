

@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Products</h1>
        <br />
        <br />
        <a href="/product/create/" class="btn btn-primary">Create New Product</a>
        <br />
        <br />
        {{ $products->links() }}
        @foreach($products as $product)
            <div class="well well-sm">
                <h2><a href="/product/{{$product->id}}">{{$product->name}} </a></h2>
                <h4>{{$product->price}}</h4>
                <p>
                    <a href="/product/{{$product->id}}/edit">Edit</a>
                </p>
                @unless(count($product->Images) < 1)
                    <p>
                        <img src="/images/{{$product->Images[0]->image_url}}" />
                    </p>
                    @endif
            </div>
        @endforeach
        {{ $products->links() }}
    </div>
@stop