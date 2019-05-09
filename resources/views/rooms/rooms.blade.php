@extends('layouts.layout')

@section('title', 'RoomTurbo 2 | Rooms')

@section('content')
<div class="row">

    <div class="col-9">
        @if($rooms)
            @foreach ($rooms as $room)
            <div class="card mb-3">
                <img class="card-img-top" src="..." alt="afbeelding -> todo">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-10">
                            <h5 class="card-title"><a href="/rooms/{{$room->id}}">{{$room->title}}</a></h5>
                            <p class="card-text">{{$room->description}}</p>
                            <p class="card-text"><small class="text-muted">Geplaatst: {{substr($room->created_at, 0, 10)}}</small></p>
                        </div>
                        <div class="col-md-2">
                            <h2 class="title">€{{$room->price}}</h2>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        @else
            <p> No rooms found in the database. </p>
        @endif
    </div>

    <div class="col-3">
        <h1 class="title">Sidebar</h1>
        <p> Sidebar content </p>
    </div>
</div>

@endsection
