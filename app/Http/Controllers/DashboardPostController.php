<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Support\Str;
class DashboardPostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.posts.index', [
            'posts' => Post::where('user_id', auth()->user()->id)->get(), //mengambil data post berdasarkan user yang sedang login
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.posts.create', [
            'categories' => Category::all(), //categories akan dikirimkan ke view create post sebagai data untuk select option category berupa variabel $categories
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'slug' => 'required|unique:posts,slug',
            'category_id' => 'required',
            'image' => 'image|file|max:1024',
            'body' => 'required',
        ]);

        if ($request->file('image')) {
            $validatedData['image'] = $request
                ->file('image')
                ->store('post-image'); //menyimpan gambar ke folder public/storage/post-image
        }

        $validatedData['user_id'] = auth()->user()->id; //mengambil id user yang sedang login
        $validatedData['excerpt'] = Str::limit(
            strip_tags($request->body),
            200,
            '...'
        ); //mengambil 200 karakter dari body post

        Post::create($validatedData); //menyimpan data ke database dan mengirimkan data yang sudah divalidasi atau insert data ke database

        return redirect('/dashboard/posts')->with(
            'success',
            'Post created successfully!'
        );
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('dashboard.posts.show', [
            'post' => $post,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        return view('dashboard.posts.edit', [
            'post' => $post,
            'categories' => Category::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $rules = [
            //membuat rules untuk validasi data yang diinputkan di form edit post
            'title' => 'required|max:255',
            'category_id' => 'required',
            'body' => 'required',
        ];

        if ($request->slug != $post->slug) {
            $rules['slug'] = 'required|unique:posts'; //jika slug yang diinputkan tidak sama dengan slug yang ada di database maka slug harus unique
        }

        $validatedData = $request->validate($rules);

        $validatedData['user_id'] = auth()->user()->id; //mengambil id user yang sedang login
        $validatedData['excerpt'] = Str::limit(
            strip_tags($request->body),
            200,
            '...'
        ); //mengambil 200 karakter dari body post

        Post::updateOrCreate(['id' => $post->id])->update($validatedData); //menyimpan data ke database dan mengirimkan data yang sudah divalidasi atau insert data ke database

        return redirect('/dashboard/posts')->with(
            'success',
            'Post has been Updated!'
        );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        Post::destroy($post->id);

        return redirect('/dashboard/posts')->with(
            'success',
            'Post has been deleted!'
        );
    }

    public function checkSlug(Request $request)
    {
        $slug = SlugService::createSlug(Post::class, 'slug', $request->title); //slugservice merupakan package dari cviebrock yang sudah diinstall sebelumnya,
        //slugservice akan membuat slug dari title yang diinputkan di form create post
        return response()->json(['slug' => $slug]); //mengembalikan slug yang sudah dibuat ke ajax request di view create post
    }
}
