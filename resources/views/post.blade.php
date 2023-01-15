@extends('layouts.main')

@section('container')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h2 class="mb-3" class="text-decoration-none">{{ $post->title }}</h2>
            <p>By. <a href="/blog?author={{ $post->user->username }}" class="text-decoration-none">{{ $post->user->name }}</a> in <a href="/blog?category={{ $post->category->slug }}" class="text-decoration-none">{{ $post->category->name }}</a></p>

            @if ($post->image)
            <div style="max-height: 350px; overflow:hidden">
                <img src="{{ asset('storage/'.$post->image) }}" class="img-fluid mt-3" alt="{{ $post->user->name }}" alt="{{ $post->category->name }}">
            </div>
                

            @else
                <img src="https://source.unsplash.com/1200x400?{{ $post->category->name }}" class="img-fluid mt-3" alt="{{ $post
                ->user->name }}" alt="{{ $post
                ->category->name }}">
            @endif



            <article class="my-3 fs-5">
                {!! $post->body !!}
            </article>

            <a href="/blog" class="text-decoration-none d-block mt-3">back to Posts</a>
        </div>
    </div>
</div>

        
        
@endsection