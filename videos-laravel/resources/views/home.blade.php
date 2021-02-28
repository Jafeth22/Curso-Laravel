@extends('layouts.app')


@section('content')

<div class="container">
    <div class="row">
        <div class="container">
            @if(session('messageSuccess'))
            <div class="aler alert-success">
                {‌{session('messageSuccess')}}
            </div>
            @endif
            @foreach($videos as $video)
            <div class="card">
                <div class="card-body pull-right">
                    <div class="row">
                        <div class="col-md-3">
                            <img class="card-img-top" src="/storage/images/{{$video->Image}}" style="width: 7rem;" alt="Image-{{$video->Title}}">
                        </div>
                        <div class="col-md-6">
                            <h4 class="card-title"><?= $video->Title ? $video->Title : "It doesn't have Title"  ?> </h4>
                            <p class="card-text"><?= $video->user->name.' '.$video->user->surname ?> </p>
                            <a href="" class="btn btn-success">See</a>
                            @if(Auth::check() && Auth::user()->id == $video->user->id)
                            <a href="" class="btn btn-secondary">Edit</a>
                            <a href="" class="btn btn-danger">Delete</a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <br>
            @endforeach
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">{{$videos->links()}}</div>
    </div>
</div>


@endsection