@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-4">
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif
                {{-- vorher nur $user->profile->image, aber wegen defaultBelegung des Profilbilds hier auf Methode zurückgreifen--}}
                <img src="{{$user->profile->profileImage()}}" class="rounded-circle mw-50" alt="Profilbild">
            </div>

            <div class="col-sm-8">
                <h2>
                    Herzlich Willkommen, <a href="/profile/{{ $user->id }}">{{ __($user->firstname) }}</a>
                </h2>
                <p>
                    @if($user->profile->is_host===true)
                        Du bist Gastgeber*in!
                    @else
                        Du bist im Moment nicht Gastgeber*in!
                    @endif
                </p>
                <b>Deine Kurzbeschreibung</b> <br>
                {{ $user->profile->title ?? 'Kein Text'}} <br>
                <button type="button" class="btn btn-outline-info">
                            <a href="/profile/{{ $user->id }}/edit">Ändere dein Profil!</a>
                </button>
            </div>
        </div>
        <div class="card-columns mt-5">
            <div class="card">
                <div class="card-header" style="background-color: #429398">Host finden</div>
                <p class="card-text" style="padding: 10px">Suche nach Ort<br>Suche nach Nutzernamen</p>
            </div>
            <div class="card bg-light">
                <div class="card-header" style="background-color: #429398">Nachrichten</div>
                <p class="card-text" style="padding: 10px">Du hast keine neuen Nachrichten.</p>
            </div>
            <div class="card">
                <div class="card-header" style="background-color: #429398">Hilfe</div>
                <p class="card-text" style="padding: 10px">FAQ<br>About</p>
            </div>
        </div>
    </div>
@endsection
