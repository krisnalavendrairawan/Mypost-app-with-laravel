<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;

class PostsController extends Controller
{
    public function index()
    {
        //dd(request('search'));
        $title = '';
        if (request('category')) {
            $category = Category::firstWhere('slug', request('category'));
            $title = ' in ' . $category->name;
        }
        if (request('author')) {
            $author = User::firstWhere('username', request('author'));
            $title = ' in ' . $author->name;
        }

        return view('posts', [
            "title" => 'All Posts' . $title,
            "active" => 'posts',
            // "posts" => Post::all()
            "posts" => Post::latest()->Filter(request(['search', 'category', 'user']))->paginate(7)->withQueryString() //lastest adalah fungsi dari laravel untuk mengurutkan dari yang terbaru
        ]);
        //with sendiri merupakan fitur laravel untuk menjalankan eager loading agar menghindari N+1 problem
        //post dan category di dalam with diambil dari method yang ada di model post
        //filter disana merupakan methode dari model post yang ditambahkan untuk mengaktifkan fitur searching

    }

    public function show(Post $post)
    {
        return view('post', [
            'title' => 'singlepost',
            "active" => 'posts',
            'post' => $post
        ]);
    }
}
