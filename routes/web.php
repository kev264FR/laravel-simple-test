<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\SecurityController;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;

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
    $posts = Post::all();
    return view('welcome', [
        'posts'=>$posts
    ]);
})->name('home');

// -------------- AUTH -----------------------

Route::get('/register', function () {
    if (Auth::check()){
        return redirect()->route('home')->with('error', 'Already connected');
    }
    return view('security/register');
})->name('register');

Route::post('/register', [SecurityController::class, 'register']);


Route::get('/login', function () {
    if (Auth::check()){
        return redirect()->route('home')->with('error', 'Already connected');
    }
    return view('security/login');
})->name('login');

Route::post('/login', [SecurityController::class, 'login']);

Route::get('/logout', function () {
    if (Auth::check()){
        Auth::logout();
        Session::flash('success', 'Disconnected');
    }else Session::flash('error', 'Disconnect failed');

    return redirect()->route('home');
})->name('logout')->middleware('auth');

// -------------- AUTH -----------------------

// -------------- POSTS ----------------------

Route::get('/post/new', function (){
    return view('posts.post_new');
})->name('newPost')->middleware('auth');

Route::post('/post/new', [PostController::class, 'addPost']);

Route::get('/post/edit/{post}', function (Post $post){
    return view('posts.post_edit', [
        'post'=>$post
    ]);
})->name('editPost')->middleware('auth');

Route::post('/post/edit/{post}', [PostController::class, 'editPost'])->middleware('auth');


// -------------- POSTS ----------------------
