<?php

namespace App\Http\Controllers\API\V1;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
   public function index() {
        return response([
            'posts' => Post::orderBy('created_at', 'desc')
           // ->with('user:id,name,photo')
            ->with('user', function($query){
                return $query
                ->select('id','name', 'photo')
                ->selectRaw("CONCAT('" . url('/') . "', '/storage/', users.photo) AS photo_url")
                ->get();
            })
            ->with('likes', function($query){
                return $query->where('user_id', Auth::user()->id)
                    ->select('id','user_id', 'post_id')->get();
            })
            ->select('posts.*')
            ->selectRaw("CONCAT('" . url('/') . "', '/storage/', posts.image) AS image_url")
            ->withCount('comments','likes')
            ->get()
        ], 200);
   }


   public function show($id) {
        return response([
            'post' => Post::where('id', $id)->withCount('comments','likes')->get()
        ], 200);
    }

    public function store(Request $request) {
        
        $attrs = $request->validate([
            'body' => 'required|string'
        ]);

        $image =  $this->saveImage($request->image, 'posts');

        $post = Post::create([
            'body' => $attrs['body'],
            'user_id' => Auth::user()->id,
            'image' => $image
        ]);
        
        return response([
            'message' => 'Post created.',
            'post' => $post
        ], 200);
    }

    public function update(Request $request, $id) {
        
        $post = Post::find($id);

        if(!$post) {
            return response([
                'message' => 'Post not found.',
            ], 403);
        }

        if($post->user_id != Auth::user()->id) {
            return response([
                'message' => 'Permission denied.',
            ], 401);
        }

        $request->validate([
            'body' => 'required|string'
        ]);

        if($request->image != null) {
            $filename = basename($post->image);
            if (Storage::disk('posts')->exists($filename)) {
                Storage::disk('posts')->delete($filename);
            }
            $image =  $this->saveImage($request->image, 'posts');
            $request->merge(['image' =>  $image]);
        }

        $post->update($request->all());
        
        return response([
            'message' => 'Post updated.',
            'post' => $post
        ], 200);
    }

    public function destroy($id) {
        
        $post = Post::find($id);

        if(!$post) {
            return response([
                'message' => 'Post not found.',
            ], 403);
        }

        if($post->user_id != Auth::user()->id) {
            return response([
                'message' => 'Permission denied.',
            ], 401);
        }

        $post->comments()->delete();
        $post->likes()->delete();
        $post->delete();

        return response([
            'message' => 'Post deleted.',
            'post' => $post
        ], 200);
    }


}
