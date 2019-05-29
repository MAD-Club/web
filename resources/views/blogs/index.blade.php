@extends('layouts.app')
@section('content')
    <div class="container">
        <h1>Blog</h1>
        @auth
            <a class="btn btn-outline-primary btn-block" href="{{ url('blogs/create') }}">New Post</a><br>
        @endauth
        @foreach($blogs as $blog)
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <a class="btn btn-block" href="{{ url('blogs/' . $blog->id) }}">
                        <div class="card">
                            @isset($blog->file)
                                <div class="card-body align-self-center">
                                    <img src="{{ asset('storage/' . $blog->file) }}" width="200px" height="200px"><br>
                                </div>
                            @endisset
                            <div class="card-footer"><h5>{{ $blog->title }}</h5></div>
                        </div>
                    </a>
                </div>
            </div><br>
        @endforeach

        {{ $blogs->links() }}
    </div>
@endsection

