<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Post;
use App\Like;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'body' => 'required|max:1000'
        ]);
        $post = new Post();
        $post->body = $request['body'];
        if($request->user()->posts()->save($post)){
            $notification = [
                'message' => 'Post Added Successfully!',
                'alert-type' => 'success'
            ];
        } else {
            $notification = [
                'message' => 'Post Adding Failed!',
                'alert-type' => 'error'
            ];
        }


        return back()->with($notification);
    }


    public function edit($id)
    {
        $posts = POST::where('id' ,$id)->first();
        return view('editPost')->with('posts', $posts);
    }

    public function update(Request $request, $id)
    {
        $post = POST::find($id);

        $post->body = $request->body;

        $result = $post->save();
        if($result){
            $notification = [
                'message' => 'Post edited Successfully!',
                'alert-type' => 'success'
            ];
        } else {
            $notification = [
                'message' => 'Post edit Failed!',
                'alert-type' => 'error'
            ];
        }

        return redirect('home')->with($notification);
    }

    public function changeLike($id){
        $user = Auth::user()->id;
       $makeLike = Like::where([
            'user_id' => $user,
            'post_id' => $id
        ])->first();
//       return $makeLike;
       if ($makeLike){
           $un = $makeLike->like == 0 ? 1 : 0;
           Like::where([
               'user_id' => Auth::user()->id,
               'post_id' => $id
           ])->update([
                   'like' => $un
               ]);
           return response()->json(['status' => $un, 'message' => 'Like Changed']);
       } else {
           Like::insert([
               'user_id' => $user,
               'post_id' => $id,
               'like' => 1
           ]);
           return response()->json(['message' => 'Like done']);
       }
    }

    public function destroy($id)
    {
        $delete = POST::find($id)->delete();
        if($delete){
            $notification = [
                'message' => 'Post Deleted Successfully!',
                'alert-type' => 'success'
            ];
        } else {
                $notification = [
                    'message' => 'Post Delete Failed!',
                    'alert-type' => 'error'
                ];
            }

        return back()->with($notification);
    }
}
