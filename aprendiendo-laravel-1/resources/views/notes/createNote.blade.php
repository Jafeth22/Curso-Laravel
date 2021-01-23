<h1>
    @if(!isset($note))
        Create note
    @else
        Update note
    @endif
</h1>
<form action="{{isset($note) ? url('/notes/update/'.$note->ID) : url('/notes')}}" method="{{isset($note) ? 'post' : 'post'}}">
    <input type="text" name="title" placeholder="Note's title" value="{{isset($note) ? $note->title : ''}}">
    <textarea name="description" placeholder="Note's description">{{isset($note) ? $note->description : ''}}</textarea>
    <br>
    <input type="submit" value="Submit">
</form>

<a href="{{url('/notes')}}">Go back</a>