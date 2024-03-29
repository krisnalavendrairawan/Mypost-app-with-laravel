@extends('dashboard.layouts.main')

@section('container')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Create New Post</h1>
    </div>

    <div class="col-lg-8">

        <form method="POST" action="/dashboard/posts" class="mb-3" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" autofocus value="{{ old('title') }}">
                @error('title')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    
                @enderror
            </div>
            <div class="mb-3">
                <label for="slug" class="form-label">Slug</label>
                <input type="text" class="form-control  @error('slug') is-invalid @enderror" id="slug" name="slug" autofocus value="{{ old('slug') }}">

                @error('slug')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    
                @enderror
            </div>
            <div class="mb-3">
                <label for="category" class="form-label">Category</label>
                <select class="form-select" name="category_id">
                    @foreach ($categories as $category)
                    @if (old('category_id') == $category->id)
                        <option value="{{ $category->id }}" selected>{{ $category->name }}</option>
                    @else
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endif
                    
                        
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="image" class="form-label">Post Image</label>
                <input class="form-control @error('image') is-invalid @enderror" type="file" id="image" name="image">

                @error('image')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>  
                @enderror
                
            </div>

            <div class="mb-3">
                <label for="body" class="form-label">Body</label>

                 @error('body')
                    
                       <p class="text-danger"> {{ $message }}</p> 
                    
                @enderror

                <input id="body" type="hidden" name="body" value="{{ old('body') }}">
                <trix-editor input="body"></trix-editor>

               
            </div>
                <button type="submit" class="btn btn-primary">Create Post</button>
        </form>

        
    </div>

    <script>
        const title = document.querySelector('#title');
        const slugs = document.querySelector('#slug');

        title.addEventListener('change', function() { //change ini untuk ketika kita mengubah title
            fetch('/dashboard/posts/checkSlug?title=' + title.value) //title.value ini untuk mengambil value dari title
                .then(response => response.json())
                .then(data => slug.value = data.slug) //slug.value = data.slug ini untuk mengubah value dari slug
        }); 
        
    </script>
@endsection