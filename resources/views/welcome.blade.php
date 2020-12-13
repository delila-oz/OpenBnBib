<style>
    .obb-open {
        color:#429398;
        font-family: "old_standard_ttbold", Georgia, serif;
        font-size: 1.2em;
        background: #fff;
        padding: 8px 5px 3px;
        text-shadow: 0 1px 0 #fafafa;
        text-rendering: optimizelegibility;
        font-weight: 400;
        line-height: 1;
        display: inline-block;
    }
    .obb-bn {
        color:#6B5D4D;
        font-family: "old_standard_ttbold", Georgia, serif;
        font-size: 1.2em;
        background: #fff;
        padding: 8px 5px 3px;
        margin: 0 1px 1px 0;
        text-shadow: 0 1px 0 #fafafa;
        text-rendering: optimizelegibility;
        font-weight: 400;
        line-height: 1;
        display: inline-block;
    }
    .obb-bib {
        color:#B0A18F;
        font-family: "old_standard_ttbold", Georgia, serif;
        font-size: 1.2em;
        background: #fff;
        padding: 8px 5px 3px;
        text-shadow: 0 1px 0 #fafafa;
        text-rendering: optimizelegibility;
        font-weight: 400;
        line-height: 1;
        display: inline-block;
    }
</style>
@extends('layouts.app')

@section('content')
    {{--    container-fluid align-content-center flex-wrap align-items-center --}}
    <div class="d-flex align-items-center pt-5">
        <div class="row">
            <div class="col-md-4 offset-md-1">
                <h1 class="text-right">
                    <span class="obb-open">Open</span>
                    <span class="obb-bn">B'n</span>
                    <span class="obb-bib">Bib</span>
                </h1>
                <p class="text-justify">Willkommen bei Open BnBib<br>
                    der allgemeinnützigen und kostenlosen Gastgeberseite für Alle aus informations- und bibliotheksverwandten Berufen.
                    Du suchst eine Übernachtungsmöglichkeit in einer anderen Stadt, weil du dort
                <ul>
                    <li>                    eine Fortbildung
                    </li>
                    <li>                    eine Fachtagung
                    </li>
                    <li>                    eine Messe
                    </li>
                    <li>                    den Bibliothekartag
                    </li>
                </ul>
                besuchst?<br/>
                Dann melde dich an und schau, ob du bei einer Fachkollegin oder einem Fachkollegen unterkommen kannst –
                Tipps, Tricks und (fachlicher) Austausch inklusive!<br/>
                Hast du ein Gästezimmer?<br/>
                Findest du Menschen aus der LIS-Community grundsätzlich sympathisch?<br/>
                Kannst du dir vorstellen, Fachkolleginnen oder Fachkollegen eine Übernachtungsmöglichkeit für eine
                oder mehrere Nächte zur Verfügung zu stellen?<br/>
                Dann melde dich an und teile die schönsten Ecken, besten Restaurants und beeindruckensten Bibliotheken mit Gästen aus der ganzen Welt.

            </div>

            <div class="col-md-4 offset-md-1 text-center">
                <div class="card-header" style="background-color: #429398">{{ __('Mitmachen') }}</div>

                <div class="card-body bg-light">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Vorname') }}</label>

                            <div class="col-md-6">
                                <input id="firstname" type="text" class="form-control @error('firstname') is-invalid @enderror"
                                       name="firstname" value="{{ old('firstname') }}" required autocomplete="firstname" autofocus>

                                @error('firstname')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nachname') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('lastname') is-invalid @enderror"
                                       name="lastname" value="{{ old('lastname') }}" required autocomplete="lastname" autofocus>

                                @error('lastname')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Adresse') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="username" class="col-md-4 col-form-label text-md-right">{{ __('Nutzername') }}</label>

                            <div class="col-md-6">
                                <input id="username" type="username" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" required autocomplete="username">

                                @error('username')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Passwort') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Passwort bestätigen') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>

@endsection

