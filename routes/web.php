<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CommentController;
use App\Models\User;
use Laravel\Socialite\Facades\Socialite;
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

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/posts', [PostController::class,'index'])->name('posts.index');
// Route::get('/posts/create', [PostController::class,'create'])->name('posts.create');
// Route::post('/posts', [PostController::class,'store'])->name('posts.store');
// Route::put('/posts/{post}', [PostController::class,'update'])->name('posts.update'); //has the same route of show 
// Route::get('/posts/{post}', [PostController::class,'show'])->name('posts.show');     //has the same route of update
// Route::get('/posts/{post}/edit', [PostController::class,'edit'])->name('posts.edit');
// Route::delete('/posts/{post}',[PostController::class,'destroy'])->name('posts.destroy');

// Route::group(function(){
//     Route::get('/posts', [PostController::class,'index'])->name('posts.index');
//     Route::get('/posts/create', [PostController::class,'create'])->name('posts.create');
//     Route::post('/posts', [PostController::class,'store'])->name('posts.store');
//     Route::put('/posts/{post}', [PostController::class,'update'])->name('posts.update'); //has the same route of show 
//     Route::get('/posts/{post}', [PostController::class,'show'])->name('posts.show');     //has the same route of update
//     Route::get('/posts/{post}/edit', [PostController::class,'edit'])->name('posts.edit');
//     Route::delete('/posts/{post}',[PostController::class,'destroy'])->name('posts.destroy');
//     Route::post('/comments',[CommentController::class,'store'])->name('comments.store');

// })->middleware("auth");

Route::middleware(['auth'])->group(function () {
Route::get('/posts', [PostController::class,'index'])->name('posts.index');
Route::get('/posts/create', [PostController::class,'create'])->name('posts.create');
Route::post('/posts', [PostController::class,'store'])->name('posts.store');
Route::put('/posts/{post}', [PostController::class,'update'])->name('posts.update'); //has the same route of show 
Route::get('/posts/{post}', [PostController::class,'show'])->name('posts.show');     //has the same route of update
Route::get('/posts/{post}/edit', [PostController::class,'edit'])->name('posts.edit');
Route::delete('/posts/{post}',[PostController::class,'destroy'])->name('posts.destroy');
Route::post('/comments',[CommentController::class,'store'])->name('comments.store');
});
Route::get('/auth/redirect', function () {
    return Socialite::driver('github')->redirect();
})->name('github.auth');
 
Route::get('/auth/callback', function () {
    $githubUser = Socialite::driver('github')->user();
    $user =User::where('github_id', $githubUser->id)->first();
 
    if ($user) {
        $user->update([
            'github_token' => $githubUser->token,
            'github_refresh_token' => $githubUser->refreshToken,
        ]);
    } else {
        $user = User::create([
            'name' => $githubUser->name,
            'email' => $githubUser->email,
            'github_id' => $githubUser->id,
            'github_token' => $githubUser->token,
            'github_refresh_token' => $githubUser->refreshToken,
        ]);
    }
 
    Auth::login($user);
 
    return redirect('/dashboard');
    // Auth::login($user);

    // return redirect()->route('posts.index');
});



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
