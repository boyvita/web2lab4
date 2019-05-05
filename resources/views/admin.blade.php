@extends("layout")

@section("header")
    Admin page
@endsection


@section("content")
    <div class="my-3">
        <h1>Hello admin!</h1>
        <form method="post" action="/admin/create">
            {{ csrf_field() }}
            <div class="form-group">
                <label for="title">Title</label>
                <textarea type="text" id="title" name="title" rows="1" class="form-control"></textarea>
            </div>
            <div class="form-group">
                <label for="body">Body</label>
                <textarea type="text" id="body" name="body" rows="3" class="form-control"></textarea>
            </div>
            <button type="submit" class="submit btn btn-success">Create</button>
        </form>
    </div>
    @foreach($posts as $post)
        <div class="contatiner my-2 p-2 rounded bg-light">
            <h3>{{$post->title}}</h3>
            {{$post->body}}
            <form action="{{ url('/admin/delete', ['id' => $post->id]) }}" method="post">
                <input class="btn btn-sm btn-outline-secondary" type="submit" value="Delete" />
                {!! method_field('delete') !!}
                {!! csrf_field() !!}
            </form>
        </div>
    @endforeach

@endsection