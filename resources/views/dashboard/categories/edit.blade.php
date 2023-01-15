@extends('dashboard.layouts.main')

@section('container')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Edit Category</h1>
    </div>

    <div class="col-lg-8">

        <form method="POST" action="/dashboard/categories/{{ $categories->id }}" class="mb-3">
            @method('put')
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Category Name</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" autofocus value="{{ old('name', $categories->name) }}">
                @error('name')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    
                @enderror
            </div>
            <div class="mb-3">
                <label for="slug" class="form-label">Slug</label>
                <input type="text" class="form-control  @error('slug') is-invalid @enderror" id="slug" name="slug" autofocus value="{{ old('slug', $categories->slug) }}">

                @error('slug')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    
                @enderror
            </div>

                <button type="submit" class="btn btn-primary">Update Category</button>
        </form>

        
    </div>

    <script>
        const title = document.querySelector('#name');
        const slugs = document.querySelector('#slug');

        title.addEventListener('change', function() { //change ini untuk ketika kita mengubah title
            fetch('/dashboard/posts/checkSlug?title=' + title.value) //title.value ini untuk mengambil value dari title
                .then(response => response.json())
                .then(data => slug.value = data.slug) //slug.value = data.slug ini untuk mengubah value dari slug
        }); 
        
    </script>
@endsection