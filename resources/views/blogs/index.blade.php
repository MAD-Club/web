@extends('layouts.app')
@section('title', 'MAD Club - Blog')
@section('blogsActive', 'active')
@section('content')
        <h1>Blog</h1>
        @auth
            <a class="btn btn-outline-primary btn-block" href="{{ url('blogs/create') }}">New Post</a><br>
        @endauth
        <div class="card-deck-wrapper">
            <div class="card-deck">
            @foreach($blogs as $blog)
                <div class="col-md-4 mx-auto">
                    <a class="btn btn-block" href="{{ url('blogs/' . $blog->id) }}">
                        <div class="card">
                            @isset($blog->file)
                                <img src="{{ asset('storage/' . $blog->file) }}" class="card-img-top"><br>
                            @endisset
                            <div class="card-body">
                                <h5 class="card-title">{{ $blog->title }}</h5>
                            </div>
                        </div>
                    </a>
                </div>

            @endforeach
            </div>
        </div>
    <div class="row justify-content-center">
        {{ $blogs->links() }}
    </div>
@endsection

