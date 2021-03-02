<!-- This is to import the master page -->
@extends('layouts.app')

@section('content')
<div class="col-md-10 offset-md-2">
    <h2>{{$video->Title}}</h2>
    <hr />

    <div class="col-md-8">
        <!-- Video -->
        <!-- <div class="col-md-3">
            <img class="card-img-top" src="/storage/images/{{$video->Image}}" style="width: 7rem;" alt="Image-{{$video->Title}}">
        </div> -->
        <video controls="true" id="videoPlayer">
            <!-- <source type="video/mp4" src="{{route('fileVideo', ['idVideo' => $video->VideoPath])}}"> </source>-->
            <source src="/storage/videos/{{$video->VideoPath}}">
                Your browser doesn't support HTML  5
            </source>
        </video>
        <!-- Description -->
        <div class="card video-data">
            <div class="card-header">
                <div class="card-title">
                    <h2>{{$video->Title}}</h2>
                    Updated by <strong>{{$video->user->name.' '.$video->user->surname}}</strong>
                    <br>
                    On {{date("Y/m/d", time())}}
                </div>
            </div>
            <div class="card-body">
                {{$video->Description}}
            </div>
        </div>
        <!-- Comments -->
    </div>
</div>
@endsection