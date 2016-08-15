

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
            </div>
        @endforeach
        {{ $products->links() }}
    </div>
@stop