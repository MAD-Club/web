@extends('layouts.app')
@section('content')
    <div class="container">
        <h1>New Showcase</h1>

        <form method="POST" action="{{ action('ShowcaseController@store') }}" enctype="multipart/form-data">
            @include('partials.showcasesForm', [
              'title' => old('title'),
              'description' => old('description'),
              'body' => old('body'),
              'url' => old('url'),
              'buttonName' => 'Create'])
        </form>

        @include('partials.errors')
    </div>
@endsection
