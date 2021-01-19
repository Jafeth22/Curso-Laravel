{{--This is a way to create a comment in the view--}}

{{--I can put the below include any part of the view--}}
@include ('contacto.cabecera', ['nombreInclude' => $nombreHTML])

<h3>Contact Web Page {{$nombreHTML}}</h3>

