@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="container">
            <div class="col-sm-4 col-md-4 col-lg-4">
                <h2>Search: <?= $search ?> </h2>
            </div>

            <form class="form-inline" action="{{url('/search/'.$search)}}" method="get">
                <div class="form-row align-items-center">
                    <div class="col-auto my-1">
                        <label class="mr-sm-2" for="order">Order By</label>
                    </div>
                    <div class="col-auto my-2">
                        <select class="custom-select mr-sm-2" id="order" name="order">
                            <option value="new">Newer</option>
                            <option value="old">Older</option>
                            <option value="aToZ">A to Z</option>
                        </select>
                    </div>
                    <div class="col-auto my-1">
                        <button type="submit" class="btn btn-primary">Apply</button>
                    </div>
                </div>
            </form>
            <div class="clearfix"></div>
            @include('video.videosList')
        </div>
    </div>
</div>


@endsection