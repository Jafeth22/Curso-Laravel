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
            @foreach($videos as $video)
            <div class="card">
                <div class="card-body pull-right">
                    <div class="row">
                        <div class="col-md-3">
                            <img class="card-img-top" src="/storage/images/{{$video->Image}}" style="width: 7rem;" alt="Image-{{$video->Title}}">
                        </div>
                        <div class="col-md-6">
                            <h4 class="card-title">
                                <a href="{{route('videoDetail',['id' => $video->id])}}">
                                    <?= $video->Title ? $video->Title : "It doesn't have Title"  ?>
                                </a>
                            </h4>
                            <p class="card-text"><?= $video->user->name . ' ' . $video->user->surname ?> </p>
                            <a href="" class="btn btn-success">See</a>
                            @if(Auth::check() && Auth::user()->id == $video->user->id)
                            <a href="{{route('editingVideo',['id' => $video->id])}}" class="btn btn-secondary">Edit</a>

                            <!--HTML button (start Bootstrap modal) -->
                            <a href="#deleteVideoModal{{$video->id}}" role="button" class="btn btn-large btn-danger" data-toggle="modal">Delete</a>

                            <!-- Modal / Overlay en HTML -->
                            <div id="deleteVideoModal{{$video->id}}" class="modal fade">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title">Are you sure?</h4>
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                        </div>
                                        <div class="modal-body">
                                            <p>Are you sure you want to delete this video?</p>
                                            <p class="text-secondary">
                                                <img class="card-img-top" src="/storage/images/{{$video->Image}}" style="width: 7rem;" alt="Image-{{$video->Title}}">
                                                <?= $video->Title ? $video->Title : "It doesn't have Title"  ?>
                                            </p>
                                        </div>
                                        <div class="modal-footer">
                                            <p class="text-danger"><small>If you delete it, you can never get it back.</small></p>
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                            <a href="{{url('/delete-video/'.$video->id)}}" class="btn btn-danger">Delete</a>
                                        </div>
                                    </div>
                                </div>
                            </div>

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