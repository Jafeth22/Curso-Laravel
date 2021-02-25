<!-- This is to import the master page -->
@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <h2>Create new video</h2>
        <form action="{{route('saveVideo')}}" method="post" enctype="multipart/form-data" class="col-lg-12">
            {!!csrf_field()!!}
            @if($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{$error}}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" class="form-control" id="title" name="title" value="{{old('title')}}"/>
                <!-- old(value): to fill the input in case where the validation clean the field -->
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea type="text" class="form-control" id="description" name="description">{{old('description')}}</textarea>
            </div>
            <div class="form-group">
                <label for="image">Miniature</label>
                <input type="file" class="form-control" id="image" name="image"/>
            </div>
            <div class="form-group">
                <label for="video">Video</label>
                <input type="file" class="form-control" id="video" name="video"/>
            </div>

            <button type="submit" class="btn btn-success">Upload Video</button>
        </form>
    </div>
</div>

@endsection