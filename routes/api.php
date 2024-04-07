<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\V1\LikeController;
use App\Http\Controllers\API\V1\PostController;
use App\Http\Controllers\API\V1\UserController;
use App\Http\Controllers\API\V1\CommentController;



/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('version', function () {
    return response()->json(['version' => config('app.version')]);
});


//  Route::middleware('auth:api')->get('/user', function (Request $request) {
//      Log::debug('User:' . serialize($request->user()));
//      return $request->user();
//  });


Route::namespace('App\\Http\\Controllers\\API\V1')->group(function () {
    Route::get('profile', 'ProfileController@profile');
    Route::put('profile', 'ProfileController@updateProfile');
    Route::post('change-password', 'ProfileController@changePassword');
    Route::get('tag/list', 'TagController@list');
    Route::get('category/list', 'CategoryController@list');
    Route::post('product/upload', 'ProductController@upload');

    Route::apiResources([
        //'user' => 'UserController',
        'product' => 'ProductController',
        'category' => 'CategoryController',
        'tag' => 'TagController',
    ]);
});

//Route::group(['as' => 'api.', 'namespace' => 'API\\V1'], function() {
    Route::post('/register', [UserController::class, 'register']);
    Route::post('/login', [UserController::class, 'login']);
  
    Route::group(['middleware' => ['auth:sanctum']], function(){
        Route::get('/user', [UserController::class, 'user']);
        Route::put('/user', [UserController::class, 'update']);
        Route::post('/logout', [UserController::class, 'logout']);

        //Post
        Route::apiResource('posts', PostController::class);

        //Comments
        Route::get('/posts/{id}/comments', [CommentController::class, 'index']);
        Route::post('/posts/{id}/comments', [CommentController::class, 'store']);
        Route::put('comments/{id}', [CommentController::class, 'update']);
        Route::delete('comments/{id}', [CommentController::class, 'destroy']);

        //Like
        Route::post('/posts/{id}/likes', [LikeController::class, 'likeOrUnlike']);

    });
//});

