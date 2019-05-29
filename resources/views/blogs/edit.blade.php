@extends('layouts.app')
@section('content')
    <div class="container">
        <h1>Edit Blog Post</h1>

        <form method="POST" action="{{ action('BlogController@update', $blog->id) }}" enctype="multipart/form-data">
            {{ method_field('PATCH') }}
            @include('partials.blogsForm', [
              'title' => $blog->title,
              'body' => $blog->body,
              'buttonName' => 'Update'])
        </form>

        @include('partials.errors')
    </div>
@endsection

