<!-- Here we inherit from the master view -->
@extends('layouts/master')

@section('title', 'Hola mundo')

@section('header')
    <!-- parent: This let me inherit the content from the header master -->
    @parent()
    <h2>Hola mundo's header</h2>
@stop

@section('content')
    <p>This is the Hola mundo's content</p>
@stop

@section('footer')
    <!-- parent: This let me inherit the content from the header master -->
    @parent()
    <h5>Hola mundo's footer</h5>
@stop