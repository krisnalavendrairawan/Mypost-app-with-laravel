<?php

use App\Http\Controllers\DashboardController;
use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\RegisterController;

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
    return view('home', [
        "title" => "Home",
        "active" => 'home'

    ]);
});
Route::get('/about', function () {
    return view('about', [
        "title" => "About",
        "active" => 'about',
        "name" => "Krisna Lavendra Irawan",
        "email" => "akumembuat14@gmail.com", //parameter yang dikirimkan ke view about
        "image" => "krisna.jfif"
    ]);
});

Route::get('/blog', [PostsController::class, 'index']);

//Halaman single post
Route::get('posts/{post:slug}', [PostsController::class, 'show']);

Route::get('/categories', function () {
    return view('categories', [
        'title' => 'Post Categories',
        'active' => 'categories',
        'categories' => Category::all() //mengambil dari model category
    ]);
});

// Route::get('/categories/{category:slug}', function (Category $category) { //-> merupakan route model binding
//     return view('posts', [
//         'title' => "Post By Category : $category->name",
//         'active' => 'categories',
//         'posts' => $category->posts->load('category', 'user') //load disini merupakan lazy eager model untuk menghindari N+1 problem
//     ]);
// });

// Route::get('/authors/{author:username}', function (User $author) { //-> merupakan route model binding
//     return view('posts', [
//         'title' => "Post By Author : $author->name",
//         'active' => 'posts',
//         'posts' => $author->posts->load('category', 'user')
//     ]);
// });

Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest'); //route bisa diberi nama karna lokasi default dashboard dalam guest adalah login kita bisa cari di middleware/authenticate.php
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);

Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');
Route::post('/register', [RegisterController::class, 'store']);

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth');
