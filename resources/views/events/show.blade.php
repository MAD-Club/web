@extends('layouts.app')
@section('title')
    MAD Club - {{ $event->title }}
@endsection
@section('eventsActive', 'active')
@section('content')
    <h1>{{ $event->title }}</h1>
    @isset($event->file)
    <img src="{{ asset('storage/' . $event->file) }}" width="100px" height="100px"><br>
    @endisset
    <h5><b>From:</b> {{ $event->start_date }} {{ $event->start_time }}</h5>
    <h5><b>To:</b> {{ $event->end_date }} {{ $event->end_time }}</h5>
    <h5><b>Venue:</b> {{ $event->location }}</h5>
    <p>{{ $event->description }}</p>
    @auth
        @can('crud', $event)
            <div class="btn-toolbar">
                <a class="btn btn-primary btn-group mr-2" href="{{ action('EventController@edit', $event->id) }}">Edit</a><br>
                <form method="post" action="{{ action('EventController@destroy', $event->id) }}">
                    {{ method_field('DELETE') }}
                    {{ csrf_field() }}
                    <input class="btn btn-danger btn-group mr-2" type="submit" value="Delete">
                </form><br>
            </div>
        @endcan
    @endauth
@endsection

