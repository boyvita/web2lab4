<?php
use App\Post;
use Illuminate\Http\Request;

Route::get('/', function() {
    return view('welcome', ["posts" => Post::all()]);
});

Route::delete('/admin/delete/{postID}', function($postID) {
    $post = Post::findOrFail($postID);
    if($post)
        $post->delete();
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
