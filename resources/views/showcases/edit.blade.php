@extends('layouts.app')
@section('title', 'MAD Club - Edit Showcase')
@section('showcasesActive', 'active')
@section('content')
    <h1>Edit Showcase</h1>

    <form method="POST" action="{{ action('ShowcaseController@update', $showcase->id) }}" enctype="multipart/form-data">
        {{ method_field('PATCH') }}
        @include('partials.showcasesForm', [
          'title' => $showcase->title,
          'description' => $showcase->description,
          'body' => $showcase->body,
          'url' => $showcase->url,
          'buttonName' => 'Update'])
    </form>

    @include('partials.errors')
@endsection
