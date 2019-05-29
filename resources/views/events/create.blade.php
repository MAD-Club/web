@extends('layouts.app')
@section('content')
    <div class="container">
        <h1>New Event</h1>
        <form method="POST" action="{{ action('EventController@store') }}" enctype="multipart/form-data">
            @include('partials.eventsForm', [
            'title' => old('title'),
            'location' => old('location'),
            'start_date' => old('start_date'),
            'start_time' => old('start_time'),
            'end_date' => old('end_date'),
            'end_time' => old('end_time'),
            'description' => old('description'),
            'buttonName' => 'Create'])
        </form>

        @include('partials.errors')
    </div>
@endsection
