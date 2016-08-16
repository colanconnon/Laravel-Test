@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="col-md-8">
            <h1>Create New Api Consumer</h1>
            <br />
            <br />

            {!! Form::model($apiManagement = new \App\ApiManagement, ['url' => 'apimanagement']) !!}
            {{ csrf_field() }}
            <input type="submit" value="Create New Api Key" class="btn btn-primary" />
            {!! Form::close() !!}
        </div>
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
@stop