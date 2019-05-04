@extends("layout")

@section("header")
    Main page
@endsection


@section("content")
    <div class="my-3">
        <h1>Hello user!</h1><br>
        There're {{ count($posts) }} news for you today!
    </div>
    @foreach($posts as $post)
        <div class="contatiner my-2 p-2 rounded bg-light">
            <h3>{{$post->title}}</h3>
            {{$post->body}}
        </div>
    @endforeach

@endsection