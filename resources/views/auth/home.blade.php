@extends('layouts.layout')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
            <h4 class="title col-md-8 m-4"> Kamers van {{$owner->name}}</h4>
            @if (count($rooms) > 0)
            <h6 class="title col-md-8 m-4"> Aantal kamers op Roomturbo2: {{count($rooms)}}</h6>
                @foreach ($rooms as $room)
                    <div class="card mb-3">
                        <img class="card-img-top" src="..." alt="afbeelding -> todo">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-10">
                                    <h5 class="card-title"><a href="/rooms/{{$room->id}}">{{$room->title}}</a></h5>
                                    <p class="card-text">{{$room->description}}</p>
                                    <p class="card-text">Geplaatst op: {{substr($room->created_at, 0, 10)}}</small></p>
                                </div>
                                <div class="col-md-2">
                                    <h2 class="title">€{{$room->price}}</h2>
                                </div>
                                <a class="btn btn-warning mt-4" href="/rooms/{{$room->id}}/edit">Advertentie aanpassen</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            @else
            <div class="card mb-3">
                <div class="card-body">
                    <p> Geen kamers gevonden! </p>
                    <a class="btn btn-info" href="/rooms/create">Kamer Toevoegen</a>
                </div>
            </div>
            @endif
    </div>

    <div class="col-md-4">
        <div class="card mb-3">
            <div class="card-title"><h4 class="title m-3"> Account Informatie</h4></div>
                <div class="card-body">
                    <ul class="list-group">
                        <li class="list-group-item">Naam: {{$owner->name}}</li>
                        <li class="list-group-item">Email: {{$owner->email}}</li>
                        <li class="list-group-item">Account aangemaakt op: {{substr($owner->created_at, 0, 10)}}</li>
                        <li class="list-group-item">Type Account: {{$owner->role}}</li>
                    </ul>
                    <a class="btn btn-warning mt-4" href="/home/edit">Gegevens aanpassen</a>
                    <a class="btn btn-info mt-4" href="/home/password"> Wachtwoord resetten</a>
                    <form action="/home" method="POST">
                        @csrf @method('DELETE')
                        <button class="btn btn-danger mt-4">Account verwijderen</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
