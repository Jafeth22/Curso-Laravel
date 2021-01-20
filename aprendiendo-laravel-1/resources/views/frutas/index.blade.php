<!-- Here we inherit from the master view -->
@extends('layouts/master')

@section('title', 'Frutas')

@section('header')
    <!-- parent: This let me inherit the content from the header master -->
    <!-- @parent() -->
    <h2>Here you will you some fruits with its name in Spanish</h2>
@stop

@section('content')
    
    <a href="{{route('oranges')}}">Go to Naranjas</a>
    <a href="{{action('FrutasController@anyPeras')}}">Go to Peras</a>

    <p>List of fruits</p>
    <ul>
    @foreach($frutas as $data)
        <li>{{$data}}</li>
    @endforeach
    </ul>

    <h2>Lavarel's Form</h2>
    <form action="{{url('/receive')}}" method="POST">
    <p>
        <label for="fruitName">Fruit Name:</label>
        <input type="text" name="fruitName">
    </p>
        
    <p>
        <label for="fruitDescription">Fruit Description:</label>
        <textarea name="fruitDescription"></textarea>
    </p>

        <input type="submit" value="Submit values">
    </form>
@stop