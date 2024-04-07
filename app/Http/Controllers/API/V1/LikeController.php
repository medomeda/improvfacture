<?php

namespace App\Http\Controllers\API\V1;

use App\Models\Like;
use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LikeController extends Controller
{
    
    public function likeOrUnlike($id) {
        $post = Post::find($id);

        if(!$post) {
            return response([
                'message' => 'Post not found.',
            ], 403);
        }

        $like = $post->likes()->where('user_id', Auth::user()->id)->first();

        if(!$like) {
            Like::create([
                'post_id' => $post->id,
                'user_id' => Auth::user()->id
            ]);

            return response([
                'message' => 'Liked.',
            ], 200);
        }

        $like->delete();
        return response([
            'message' => 'Disliked.',
        ], 200);
    }
}
