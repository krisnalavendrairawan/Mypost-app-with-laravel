@extends('layouts.main')

@section('container')
<h1 class="mb-5">Posts Category : {{ $category }}</h1>
    @foreach ($posts as $post)
        <h2>
            <a href="/posts/{{ $post->slug }}"> {{ $post->title }}</a>
        </h2>
        <h5>By: {{ $post->user->name }}</h5>
        <p>{{ $post->body }}</p>
    @endforeach
    
    
@endsection