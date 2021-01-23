<h2>App Notes</h2>

<a href="{{url('/notes/create')}}">Create Note</a>

@if(session('status'))
    {{session('status')}}
@endif

<ul>
@foreach($notes as $data)
    <li>
        <ul>
            <li>{{$data->title}} --- {{$data->ID}}</li>
            <li><a href="{{url('/notes/'.$data->ID)}}">Note detail</a></li>
            <li><a href="{{url('/notes/delete/'.$data->ID)}}">Delete Note</a></li>
            <li><a href="{{url('/notes/'.$data->ID.'/edit')}}">Edit Note</a></li>
        </ul>
    </li>
@endforeach
</ul>