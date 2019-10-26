@extends('layouts.app')
@section('blogsActive', 'active')
@section('title')
    MAD Club - {{ $blog->title }}
@endsection
@section('content')
    <h1>{{ $blog->title }}</h1>
    @isset($blog->file)
    <img src="{{ asset('storage/' . $blog->file) }}" width="100px" height="100px"><br>
    @endisset
    <p>{{ $blog->body }}</p> <br />
    @auth
        @can('updateDelete', $blog)
            <div class="btn-toolbar">
            <a class="btn btn-primary btn-group mr-2" href="{{ action('BlogController@edit', $blog->id) }}">Edit</a><br>
            <form method="post" action="{{ action('BlogController@destroy', $blog->id) }}">
                {{ method_field('DELETE') }}
                {{ csrf_field() }}
                <input class="btn btn-danger btn-group mr-2" type="submit" value="Delete">
            </form><br>
            </div>
        @endcan
    @endauth
@endsection
