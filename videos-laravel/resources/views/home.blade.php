@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="container">
            @if(session('messageSuccess'))
            <div class="alert alert-success">
                {{session('messageSuccess')}}
            </div>
            @endif

            <ul id="videoList">

                @foreach($videos as $video)
                <li class="video-item col-md-4 pull left-panel">
                    <!-- Image of the video -->
                    <div class="data">
                        <h4>{{$video->Title}}</h4>
                    </div>
                </li>
                <!-- Action buttons -->

                @endforeach
            </ul>
            {{$videos->links()}}
        </div>
    </div>
</div>
@endsection