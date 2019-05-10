@extends('layouts.layout')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Email adres bevestigen') }}</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('Een nieuwe link om te bevestigen is verstuurd.') }}
                        </div>
                    @endif

                    {{ __('Voordat u verdergaat, bevestig eerst uw account met de link in de email.') }}
                    {{ __('Geen email ontvagen?') }}, <a href="{{ route('verification.resend') }}">{{ __('Klik hier om nog een te sturen.') }}</a>.
                </div>
            </div>
        </div>
    </div>
@endsection
