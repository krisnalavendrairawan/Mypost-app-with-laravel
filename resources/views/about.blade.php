@extends('layouts.main')
{{-- variable yang diambil dari array route about --}}
@section('container')
    <h1>Halaman About</h1>  
    <h3>{{ $name }}</h3>
    <p>{{ $email }}</p> 

    <img src="img/{{ $image }}" alt="" width="200px" height="200px" class="img-thumbnail rounded-circle">
@endsection