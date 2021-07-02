@extends('layouts.app')

@section('content')
    @guest
    @else
    <div class="container">
        <div class="row">
            <div class="col-sm-4">
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif
            </div>

            <div class="col-sm-12">
                <h2>
                    Finde (d)ein Bett
                </h2>
{{--                <form action="/result" method="GET" role="search">--}}
                    <form action="{{ route('search') }}" method="GET">
                    @csrf
                    <div class="form-group">
                        <div class="row">
                            <div class="col">
                                <label for="plz">Postleitzahl (mind. eine Ziffer)</label>
                                <input type="number" class="form-control" id="plz" name="plz" placeholder="12345">
                            </div>
                            <div class="col">
                                <label for="profile_description">Profilbeschreibung</label>
                                <input type="text" class="form-control" id="profile_description" name="profile_description" placeholder="Über mich">
                            </div>
                        </div>
                    </div>

                    <span class = "form-group-btn">
                        <button type="submit" class="btn btn-primary">Suchen</button>
                    </span>
                </form>
                <div id="mapid" class="my-2">  </div>
                    <p>Deine Suche: <b> {{ $search }} </b> ({{$user->count()}} von {{$totalResults}} Ergebnissen)</p>
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th> </th>
                            <th>Vorname</th>
                            <th>Wohnort</th>
                            <th>Kurzbeschreibung</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($user as $profile)
                            <tr>
                                <td>
                                    <a href="/profile/{{$profile->user->username}}">
                                    <img src="{{$profile->profileImage()}}" class="image-cropper rounded-circle " style="max-height: 50px; max-width:50px;" alt="Profilbild">
                                    </a>
                                </td>
                                <td><a href="/profile/{{$profile->user->username}}">{{$profile->user->firstname}}</a></td>
                                <td>{{$profile->plz}} {{$profile->location}}</td>
                                <td>{{$profile->profile_title}}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <div class="row">
                        <div class="col-12 d-flex justify-content-center pt-3">
                            {{ $user->links() }}
                        </div>
                    </div>
            </div>

        </div>
    </div>
@endsection
@section('styles')
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css"
          integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A=="
          crossorigin=""/>

    <style>
        #mapid {
            height: 400px;
            width:100%;
            flex-grow: 1;
        }
    </style>
@endsection
@push('scripts')
    <!-- Make sure you put this AFTER Leaflet's CSS -->
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"
            integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA=="
            crossorigin=""></script>
    <script>
        var map = L.map('mapid').setView([51.4567, 10.5033], 5);
        map.invalidateSize();

        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map);

        @foreach($user as $profile)
            marker = new L.marker([{{$profile->latitude}}, {{$profile->longitude}}]).addTo(map);
            marker.bindPopup('<a href="/profile/{{$profile->user->username}}">{{$profile->user->firstname}}</a>').addTo(map);
        @endforeach

    </script>
@endpush
@endguest
