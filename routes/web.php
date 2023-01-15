<?php

use App\Http\Controllers\AdminCategoryController;
use App\Models\Category;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardPostController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Gate;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

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
        'title' => 'Home',
        'active' => 'home',
    ]);
});
Route::get('/about', function () {
    return view('about', [
        'title' => 'About',
        'active' => 'about',
        'name' => 'Krisna Lavendra Irawan',
        'email' => 'akumembuat14@gmail.com', //parameter yang dikirimkan ke view about
        'image' => 'krisna.jfif',
    ]);
});

Route::get('/blog', [PostsController::class, 'index']);

//Halaman single post
Route::get('posts/{post:slug}', [PostsController::class, 'show']);

Route::get('/categories', function () {
    return view('categories', [
        'title' => 'Post Categories',
        'active' => 'categories',
        'categories' => Category::all(), //mengambil dari model category
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

Route::get('/login', [LoginController::class, 'index'])
    ->name('login')
    ->middleware('guest'); //route bisa diberi nama karna lokasi default dashboard dalam guest adalah login kita bisa cari di middleware/authenticate.php
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);

Route::get('/register', [RegisterController::class, 'index'])->middleware(
    'guest'
);
Route::post('/register', [RegisterController::class, 'store']);

Route::get('/dashboard', function () {
    return view('dashboard.index'); //middleware.auth akan mengarahkan ke login jika belum login
})->middleware('auth');

Route::get('/dashboard/posts/checkSlug', [
    DashboardPostController::class,
    'checkSlug',
])->middleware('auth'); //dashboard/posts/checkSlug merupakan route yang akan di cek apakah slug sudah ada atau belum

Route::resource('/dashboard/posts', DashboardPostController::class)->middleware(
    'auth'
); //resource merupakan route yang sudah disediakan laravel untuk CRUD

Route::resource('/dashboard/categories', AdminCategoryController::class)
    ->except('show')
    ->middleware('admin');

Route::resource('/dashboard/users', UserController::class)
    ->except('show')
    ->middleware('admin');
