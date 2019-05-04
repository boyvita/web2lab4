<?php
use App\Post;
use Illuminate\Http\Request;

Route::get('/', function() {
    return view('welcome', ["posts" => Post::all()]);
});

Route::get('/admin/delete{postID}', function($postID){
    Post::destroy($postID);
    return redirect('/admin');
});

Route::get('/admin', function(){
    return view('admin', ["posts" => Post::all()]);
});

Route::post('/admin/create', function (Request $request) {
    if ($request->input("title") == "" || $request->input("body") == "")
        return redirect('/admin');
    $post = new Post();
    $post->title = $request->input("title");
    $post->body = $request->input("body");
    $post->save();
    return redirect('/admin');
});
