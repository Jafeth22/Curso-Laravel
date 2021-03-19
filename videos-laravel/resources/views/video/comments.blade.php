<hr>
<h4>Comments</h4>
<hr>
@if(session('message'))
<div class="aler alert-success">
    <?= session('message') ?>
</div>
@endif
@if(Auth::check())
<form class="col-md-5" method="post" action="{{url('/comment')}}">
    {!!csrf_field()!!}
    <input type="hidden" name="IdVideo" value="{{$video->id}}" require>
    <p>
        <textarea class="form-control" name="body" required></textarea>
    </p>
    <input type="submit" value="Comment" class="btn btn-success">
</form>
@endif

@if(isset($video->comments))
<div id="comments-list">
    @foreach($video->comments as $item)
    <br>
    <div class="comment-item col-md-12 pull-left">
        <div class="card video-data">
            <div class="card-header">
                <div class="card-title">
                    <strong><?= $item->user->name . ' ' . $item->user->surname ?></strong> Updated <?= \FormatTime::LongTimeFilter($item->Created_at) ?>
                    @if(Auth::check() && (Auth::user()->id == $item->user_id || Auth::user()->id == $video->user_id))
                    <!--HTML button (start Bootstrap modal) -->
                    <a href="#deleteCommentModal{{$item->id}}" role="button" class="btn btn-large btn-danger float-right" data-toggle="modal">Delete</a>

                    <!-- Modal / Overlay en HTML -->
                    <div id="deleteCommentModal{{$item->id}}" class="modal fade">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title">Are you sure?</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                </div>
                                <div class="modal-body">
                                    <p>Are you sure you want to delete this comment?</p>
                                    <p class="text-secondary"> {{$item->Body}} </p>
                                </div>
                                <div class="modal-footer">
                                    <p class="text-danger"><small>If you delete it, you can never get it back.</small></p>
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-danger">Delete</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif
                </div>
            </div>
            <div class="card-body">
                {{$item->Body}}
            </div>
        </div>
    </div>
    @endforeach
</div>
@endif