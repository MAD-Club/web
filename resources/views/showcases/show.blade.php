@extends('layouts.app')
@section('content')
    <div class="container">
        <h1>{{ $showcase->title }}</h1>
        @isset($showcase->url)
            <a class="btn btn-outline-primary" href="{{ $showcase->url }}">Find Project here</a><br>
        @endisset
        @isset($showcase->file)
        <img src="{{ asset('storage/' . $showcase->file) }}" width="100px" height="100px"><br>
        @endisset
        <p>{{ $showcase->body }}</p> <br />
        @auth
            @can('updateDelete', $showcase)
                <div class="btn-toolbar">
                    <a class="btn btn-primary btn-group mr-2" href="{{ action('ShowcaseController@edit', $showcase->id) }}">Edit</a><br>
                    <form method="post" action="{{ action('ShowcaseController@destroy', $showcase->id) }}">
                        {{ method_field('DELETE') }}
                        {{ csrf_field() }}
                        <input class="btn btn-danger btn-group mr-2" type="submit" value="Delete">
                    </form><br>
                </div>
            @endcan
        @endauth
    </div>
@endsection

