<?php

namespace App\Http\Controllers\API\V1;

use App\Models\Post;
use App\Models\Comment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function index($id) {
        
        $post = Post::find($id);

        if(!$post) {
            return response([
                'message' => 'Post not found'
            ], 403);
        }

        return response([
            'comments' => $post->comments()
            //->with('user:id,name,photo')
            ->with('user', function($query){
                return $query
                ->select('id','name', 'photo')
                ->selectRaw("CONCAT('" . url('/') . "', '/storage/', users.photo) AS photo_url")
                ->get();
            })
            ->get()
        ], 200);
   
    }

    public function store(Request $request, $id) {
        
        $post = Post::find($id);

        if(!$post) {
            return response([
                'message' => 'Post not found'
            ], 403);
        }

        $attrs = $request->validate([
            'comment' => 'required|string',
        ]);

        $post = Comment::create([
            'comment' => $attrs['comment'],
            'post_id' => $id,
            'user_id' => Auth::user()->id
        ]);
        

        return response([
            'message' => 'Comment created.'
        ], 200);

    }

    public function update(Request $request, $id) {
        
        $comment = Comment::find($id);

        if(!$comment) {
            return response([
                'message' => 'Comment not found.'
            ], 403);
        }

        if($comment->user_id != Auth::user()->id) {
            return response([
                'message' => 'Permission denied.',
            ], 401);
        }

        $attrs = $request->validate([
            'comment' => 'required|string'
        ]);

        $comment->update([
            'comment' => $attrs['comment'],
        ]);

        return response([
            'message' => 'Comment updated.'
        ], 200);

    }

    public function destroy($id) {
        $comment = Comment::find($id);

        if(!$comment) {
            return response([
                'message' => 'Comment not found.'
            ], 403);
        }

        if($comment->user_id != Auth::user()->id) {
            return response([
                'message' => 'Permission denied.',
            ], 401);
        }

        $comment->delete();

        return response([
            'message' => 'Comment deleted.'
        ], 200);

    }
}
