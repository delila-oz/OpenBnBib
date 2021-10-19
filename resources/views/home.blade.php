@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-3">
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif
                {{-- vorher nur $user->profile->image, aber wegen defaultBelegung des Profilbilds hier auf Methode zurückgreifen--}}
                <img src="{{$user->profile->profileImage()}}" class="rounded-circle mw-50" height="150px" width="150px" alt="Profilbild">
            </div>

            <div class="col-sm-9">
                <h2>
                    Herzlich Willkommen, <a href="/profile/{{ $user->username }}">{{ __($user->firstname) }}</a>
                </h2>
                <p>
                    @isset($user->profile->is_host)
                    @if($user->profile->is_host===true)
                        Du bist Gastgeber:in!
                    @else
                        Du bist im Moment nicht Gastgeber:in!
                    @endif
                    @endisset
                </p>
                <b>Deine Kurzbeschreibung</b> <br>
                {{ $user->profile->profile_title ?? 'Kein Text'}} <br>
                <button type="button" class="btn btn-outline-info">
                            <a href="/profile/{{ $user->username }}/edit">Ändere dein Profil!</a>
                </button>


            </div>
{{--            <div class="card-columns mt-5">--}}
{{--                <div class="card">--}}
{{--                    <p class="card-text" style="padding: 10px"><a href="/search">Suche nach Ort</a><br>Suche nach Nutzernamen</p>--}}
{{--                </div>--}}
{{--                <div class="card bg-light">--}}
{{--                    <p class="card-text" style="padding: 10px">--}}
{{--                        <a href="/messages">Nachrichten @include('messenger.unread-count')</a><br>--}}
{{--                        <a href="/messages/create">Schreibe eine Nachricht</a>--}}
{{--                    </p>--}}
{{--                </div>--}}
{{--            </div>--}}
            <img class="mx-auto d-block" src="storage/hands.png" alt="Shaking hands">
            <p></p>
            <div class="card-deck">
                <div class="card bg-light" style="border-color: teal">
                    <div class="card-body text-center">
                        <h3 class="card-text">Sei ehrlich</h3>
                        <p class="card-text">Als Gast ... Stelle Dich deiner Gastgeberin vor. Agiere unter deinem echten Namen –  Du möchtest ja auch wissen, mit wem du es zu tun hast! Formuliere Deine Erwartungen offen.</p>
                        <p class="card-text">Als Gastgeber:in ... Informiere deine Gäste über deine Wohnsituation und dich. Beschönige Deine Übernachtungsmöglichkeit nicht – wir sind hier nicht bei einer Immobilienplattform! </p>
                    </div>
                </div>
                <div class="card bg-light"  style="border-color: teal">
                    <div class="card-body text-center">
                        <h3 class="card-text">Sei rücksichtsvoll</h3>
                        <p class="card-text">Respektiert gegenseitig eure Privatsphären und nehmt Rücksicht auf eure (auch unterschiedlichen) Gepflogenheiten. </p>
                    </div>
                </div>
                <div class="card bg-light" style="border-color: teal">
                    <div class="card-body text-center">
                        <h3 class="card-text">Sei verbindlich</h3>
                        <p class="card-text">Falls etwas dazwischen kommt, melde dich rechtzeitig – sowohl als Gast wie auch als Gastgber:in! Genauso wie du als nicht vor verschlossener Tür stehen möchtest, möchtest du als Gastgeber:in nicht ewig auf deinen Gast warten.</p>
                    </div>
                </div>
            </div>
            <p><span>Das farblich angepasste Handschlag-Emoji entstammt den </span><a href='https://github.com/twitter/twemoji'><span>Twitter Emojis</span></a><span> von </span><a href='https://twitter.com/'><span>Twitter, Inc</span></a><span>, die unter </span><a href='https://creativecommons.org/licenses/by/4.0/'><span>CC-BY 4.0</span></a><span> lizenziert sind.</span></p>
        </div>

    </div>
@endsection
