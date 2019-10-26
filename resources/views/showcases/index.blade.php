@extends('layouts.app')
@section('title', 'MAD Club - Showcase')
@section('showcasesActive', 'active')
@section('content')
    <h1>Showcase</h1>
    @auth
        <a class="btn btn-outline-primary btn-block" href="{{ url('showcases/create') }}">New Showcase</a><br>
    @endauth
    <div class="card-deck-wrapper">
        <div class="card-deck">
            @foreach($showcases as $showcase)
                <div class="col-md-4 mx-auto">
                    <a href="{{ url('showcases/' . $showcase->id) }}">
                        <div class="card">
                            @isset($showcase->file)
                            <img src="{{ asset('storage/' . $showcase->file) }}" class="card-img-top"><br>
                            @endisset
                            <div class="card-body">
                                <h5 class="card-title">{{ $showcase->title }}</h5>
                                <p class="card-text">{{ $showcase->description }}</p>
                            </div>
                        </div>
                    </a>
                </div>

            @endforeach
        </div>
    </div>
    <div class="row justify-content-center">
        {{ $showcases->links() }}
    </div>
@endsection
