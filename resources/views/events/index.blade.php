@extends('layouts.app')
@section('title', 'MAD Club - Events')
@section('eventsActive', 'active')
@section('content')
    <h1>Events</h1>
    @can('crud', App\Event::class)
        <a class="btn btn-outline-primary btn-block" href="{{ url('events/create') }}">New event</a><br>
    @endcan
    @foreach($events as $event)
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">{{ $event->title }}</div>
                    @isset($event->file)
                    <div class="card-body align-self-center">
                        <img src="{{ asset('storage/' . $event->file) }}" width="200px" height="200px"><br>
                    </div>
                    @endisset
                    <div class="card-footer"><a class="btn btn-block" href="{{ url('events/' . $event->id) }}">View Post</a></div>
                </div>
            </div>
        </div><br>
    @endforeach

    {{ $events->links() }}
@endsection
