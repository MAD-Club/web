@extends('layouts.app')
@section('content')
    <div class="container">
        <h1>New Blog Post</h1>

        <form method="POST" action="{{ action('BlogController@store') }}" enctype="multipart/form-data">
            @include('partials.blogsForm', [
              'title' => old('title'),
              'body' => old('body'),
              'buttonName' => 'Create'])
        </form>

        @include('partials.errors')
    </div>
@endsection

