@extends('layouts.app')
@section('title', 'MAD Club - Edit Event')
@section('eventsActive', 'active')
@section('content')
    <h1>Edit Event</h1>
    <form method="POST" action="{{ action('EventController@update', $event->id) }}" enctype="multipart/form-data">
        {{ method_field('PATCH') }}
        @include('partials.eventsForm', [
        'title' => $event->title,
        'location' => $event->location,
        'start_date' => $event->start_date,
        'start_time' => $event->start_time,
        'end_date' => $event->end_date,
        'end_time' => $event->end_time,
        'description' => $event->description,
        'buttonName' => 'Update'])
    </form>

    @include('partials.errors')
@endsection
