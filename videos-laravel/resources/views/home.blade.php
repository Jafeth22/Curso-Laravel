@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="container">
            @if(session('messageSuccess'))
            <div class="aler alert-success">
                <?= session('messageSuccess') ?>
            </div>
            @endif
            
            @include('video.videosList')
        </div>
    </div>
</div>


@endsection