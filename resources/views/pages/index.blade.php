@extends('layouts.layout')

@section('title', 'RoomTurbo 2 | Homepagina')

@section('content')
    <h1> Homepagina van RoomTurbo2 </h1>
    @if($rooms)
    <h4> Dit zijn recent toegevoegde kamers: </h4>
    @foreach ($rooms as $room)
    <div class="card mb-3">
        <div class="card-body">
            <div class="row">
                <div class="col-md-10">
                    <h5 class="card-title"><a href="/rooms/{{$room->id}}">{{$room->title}}</a></h5>
                    <p class="card-text">{{$room->description}}</p>
                    <p class="card-text"><small class="text-muted">Geplaatst: {{substr($room->created_at, 0, 10)}} door {{$room->owner}}</small></p>
                </div>
                <div class="col-md-2">
                    <h2 class="title">€{{$room->price}}</h2>
                </div>
            </div>
        </div>
    </div>
    @endforeach
@else
    <p> Geen kamers gevonen! </p>
@endif
@endsection
