<!-- This is to import the master page -->
@extends('layouts.app')

@section('content')
<div class="col-md-10 offset-md-2">
    <h2>{{$video->Title}}</h2>
    <hr />

    <div class="col-md-8">
        <!-- Video -->
        <video controls="true" id="videoPlayer">
            <!-- <source type="video/mp4" src="{{route('fileVideo', ['path' => $video->VideoPath])}}"> </source>-->
            <source src="/storage/videos/{{$video->VideoPath}}">
                Your browser doesn't support HTML  5
            </source>
        </video>
        <!-- Description -->
        <div class="card video-data">
            <div class="card-header">
                <div class="card-title">
                    <h2>{{$video->Title}}</h2>
                    By <strong>{{$video->user->name.' '.$video->user->surname}}</strong> Updated <?= \FormatTime::LongTimeFilter($video->Created_at) ?>
                </div>
            </div>
            <div class="card-body">
                {{$video->Description}}
            </div>
        </div>
        <!-- Comments -->
        @include('video.comments')
    </div>
</div>
@endsection