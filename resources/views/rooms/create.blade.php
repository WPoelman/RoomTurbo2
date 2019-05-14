@extends('layouts.layout')

@section('title', 'RoomTurbo 2 | Kamer Toevoegen')

@section('content')
<div class="row">
    <h1 class="title"> Kamer toevoegen </h1>
    <div class="col-md-9 mt-5 card p-3">
        <form method="POST" action="/rooms" enctype="multipart/form-data">

            @csrf

            <div class="form-group row">
                <label for="inputSize" class="col-sm-2 col-form-label">Advertentie titel</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="inputTitle" name="title" value="{{ old('title') }}" required>
                </div>
            </div>

            <div class="form-group row">
                <label for="inputSize" class="col-sm-2 col-form-label">Grootte van de kamer (in m<sup>2</sup>)</label>
                <div class="col-sm-4">
                    <input type="text" class="form-control" id="inputSize" name="size" value="{{ old('size') }}" required>
                </div>
                <label for="inputPrice" class="col-sm-3 col-form-label">Prijs per maand (hele euro's)</label>
                <div class="col-sm-3">
                    <input type="text" class="form-control" id="inputPrice" name="price" value="{{ old('price') }}">
                </div>
            </div>

            <div class="form-group row">
                <label for="inputType" class="col-sm-2">Type</label>
                <div class="col-sm-6">
                    <select class="custom-select" name="type">
                        <option value="Kamer">Kamer</option>
                        <option value="Apartement">Appartement</option>
                        <option value="Studio">Studio</option>
                        <option value="Woonboot">Woonboot</option>
                    </select>
                </div>
            </div>

            <div class="form-group row">
                <label for="inputZip_code" class="col-sm-2 col-form-label">Postcode</label>
                <div class="col-sm-5">
                    <input type="text" class="form-control" id="inputZip_code" name="zip_code" value="{{ old('zip_code') }}">
                </div>
                <label for="inputNumber" class="col-sm-2 col-form-label">Huisnummer</label>
                <div class="col-sm-3">
                    <input type="text" class="form-control" id="inputNumber" name="number" value="{{ old('number') }}">
                </div>
            </div>

            <div class="form-group row">
                <label for="inputDescription" class="col-sm-2 col-form-label">Beschrijving</label>
                <div class="col-sm-10">
                    <textarea class="form-control" id="inputDescription" name="description">{{ old('description') }}</textarea>
                </div>
            </div>

            <div class="form-group row">
                <label for="inputPicture" class="col-sm-2 col-form-label">Afbeelding(en) toevoegen (niet groter dan 2mb)</label>
                <div class="col-sm-8">
                        <input type="file" id="inputPicture" name="pictures[]" multiple="multiple">
                </div>
            </div>

            <div class="form-group row">
                <div class="col-sm-3">
                    <button type="submit" class="btn btn-info">Versturen</button>
                </div>
            </div>
        </form>
    </div>

    <div class="col-3">
        <h1 class="title">Sidebar</h1>
        <p> Sidebar content </p>
    </div>
</div>

@endsection
