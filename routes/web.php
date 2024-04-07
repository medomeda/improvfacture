<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\VideoController;
use App\Http\Controllers\Back\RoleController;
use App\Http\Controllers\Back\TierController;
use App\Http\Controllers\Back\UserController;
use App\Http\Controllers\Back\AdminController;
use App\Http\Controllers\Back\AuditController;
use App\Http\Controllers\Back\ReportController;
use App\Http\Controllers\Back\ArticleController;
use App\Http\Controllers\Back\SettingsController;
use App\Http\Controllers\Back\AttachmentController;
use App\Http\Controllers\Back\PermissionController;


/*Route::get('/', function(){
    return view('welcome');
})->name('home');*/

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::prefix('videos')->group(function () {
    Route::get('index', [VideoController::class, 'index'])->name('videos.index');
    Route::post('split', [VideoController::class, 'split'])->name('videos.split');
});

//Route::resource('quizs', App\Http\Controllers\QuizController::class);

Auth::routes();
// Auth::routes(['verify' => true]);

Route::prefix('admin')->middleware(['auth', 'perm'])->group(function () {
   
    Route::name('admin.')->group(function () {

        Route::prefix('settings')->group(function () {
            Route::get('tables', [SettingsController::class, 'tables'])->name('settings.tables');
        });
        Route::resource('settings', SettingsController::class);

        Route::resource('audits', AuditController::class);

        Route::resource('reports', ReportController::class);

        Route::apiResource('attachments', AttachmentController::class);
        Route::prefix('images')->group(function () {
            Route::get('list', [AttachmentController::class, 'list'])->name('images.list');
        });

        Route::get('/dashboard', [AdminController::class, 'index'])->name('index');
        Route::get('/profile', [AdminController::class, 'profile'])->name('profile');
        Route::post('change-password', [AdminController::class, 'changepassword'])->name('changepassword');
        Route::get('/dashboardsup', [AdminController::class, 'dashboardsup'])->name('dashboardsup');
      

        Route::prefix('users')->group(function () {
            Route::get('list', [UserController::class, 'list'])->name('users.list');
            Route::post('delete/{id}', [UserController::class, 'delete'])->name('users.delete');
        });
        Route::resource('users', UserController::class);
        Route::resource('roles', RoleController::class);
        Route::resource('permissions', PermissionController::class);

        //Route::resource('categories', CategorieController::class);
        Route::resource('articles', ArticleController::class);
        Route::resource('tiers', TierController::class);



    });
});


