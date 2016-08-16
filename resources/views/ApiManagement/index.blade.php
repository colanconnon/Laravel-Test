@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Api Keys</h1>
        <br />
        <a href="/apimanagement/create"> Create New Api Key</a>
        <br />
        <br />
        @foreach($items as $item)
            <div class="well well-sm">
                <p>Private Api Key: {{ $item->private_api_key }}</p>
                <p>Public Api Key: {{ $item->public_api_key }}</p>
            </div>
        @endforeach

    </div>
@stop

