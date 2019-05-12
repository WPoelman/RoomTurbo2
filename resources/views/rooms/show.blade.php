@extends('layouts.layout')

@section('title', 'RoomTurbo 2 | '. $room->title)

@section('content')
<div class="row">
    <div class="col-9">
        <div class="card mb-3">
            <div class="card-body">
                <h1 class="card-title">{{$room->title}}</h1>
                <p class="card-text"><small class="text-muted">Geplaatst: {{substr($room->created_at, 0, 10)}} door {{$room->owner}}</small></p>
            </div>
            <div class="row">
                <div class="col-sm-3">
                    <div class="card">
                        <div class="card-body">
                            <p>Prijs: <strong>€{{$room->price}},-</strong> per maand</p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="card">
                        <div class="card-body">
                            <p>Grootte: {{$room->size}}m<sup>2</sup></p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="card">
                        <div class="card-body">
                            <p>Type: {{$room->type}}</p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="card">
                        <div class="card-body">
                            <p>Adres: {{$room->zip_code}}, {{$room->number}}</p>
                        </div>
                    </div>
                </div>
            </div>

            <img class="card-img" src="..." alt="afbeelding -> todo">

            <div class="row justify-content-center">
                <div class="col-sm-8">
                    <div class="card mb-3">
                        <div class="card-body">
                            <p class="card-text">{{$room->description}}</p>
                        </div>
                    </div>
                </div>

                <div class="col-sm-2">
                    <button type="button" class="btn btn-info @guest disabled @endguest ">Stuur een bericht!</button>
                    @guest <small> Log in om een bericht te sturen.</small> @endguest

                    @if(Auth::id() == $room['owner_id'])
                        <a class="btn btn-warning mt-4" href="/rooms/{{$room->id}}/edit">Advertentie aanpassen</a>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <div class="col-3">
        <h1 class="title">Sidebar</h1>
        <p> Sidebar content </p>
    </div>
</div>

@endsection
