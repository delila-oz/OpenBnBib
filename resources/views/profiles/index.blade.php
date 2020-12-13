<!--<style>
    ul.flat_description {
        list-style: none;
        margin: 0;
        padding: 0;
    }

    ul.flat_description li:before {
        content: '\2714\0020';
    }
    .row {
        padding-bottom: 15px;
    }
    .image-cropper {
        width: 220px;
        height: 220px;
        position: relative;
        overflow: hidden;
        border-radius: 50%;
    }
</style>-->

@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif
                {{-- vorher nur $user->profile->image, aber wegen defaultBelegung des Profilbilds hier auf Methode zurückgreifen--}}
                    <img src="{{$user->profile->profileImage()}}" class="image-cropper rounded-circle mw-100 float-left mb-sm-4 mr-sm-4" alt="Profilbild">
                    <h2>Das Profil von {{ __($user->firstname) }}</h2>
                    @can ('update', $user->profile)
                        <p><a href="/profile/{{ $user->id }}/edit">{{ __('Mein Profil bearbeiten') }}</a></p>
                    @endcan
                    <button type="button" class="btn btn-outline-info">Nachricht schreiben</button>
                    <button type="button" class="btn btn-outline-info">ins Gästebuch schreiben </button>
            </div>
            <div class="col-sm-12">
                <ul class="nav nav-tabs">
                    <li class="nav-item">
                        <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Über mich</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="couch-tab" data-toggle="tab" href="#couch" role="tab" aria-controls="home" aria-selected="true">Übernachtung</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="work-tab" data-toggle="tab" href="#work" role="tab" aria-controls="home" aria-selected="true">Berufliches</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="comments-tab" data-toggle="tab" href="#comments" role="tab" aria-controls="home" aria-selected="true">Mein Gästebuch</a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                        <div class="row">
                            <div class="col-sm-3 font-weight-bold pr-5">Mein Profiltitel</div>
                            <div class="col-sm-9">{{ $user->profile->profile_title ?? 'Schreibe hier eine kurzen Text!'}}</div>
                        </div>
                        <div class="row">
                            <div class="col-sm-3 font-weight-bold pr-5">Über mich</div>
                            <div class="col-sm-9">{{ optional($user->profile)->profile_description}}</div>
                        </div>
                    </div>
                    <div id="work" class="tab-pane fade">
                        <div class="row">
                            <div class="col-sm-3 font-weight-bold pr-5">Was ich beruflich mache</div>
                            <div class="col-sm-9">{{ optional($user->profile)->professional_description}}</div>
                        </div>
                        <div class="row">
                            <div class="col-sm-3 font-weight-bold pr-5">Was ich anbieten kann</div>
                            <div class="col-sm-9">{{ optional($user->profile)->professional_offer}}</div>
                        </div>
                    </div>

                    <div id="couch" class="tab-pane fade">
                        <div class="row">
                            <div class="col-sm-3 font-weight-bold pr-5">Meine Wohnung</div>
                            <div class="col-sm-9">
                                <div class="card-body" id="mapid"></div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-3 font-weight-bold pr-5">Meine Übernachtungsmöglichkeit</div>
                            <div class="col-sm-9">{{ optional($user->profile)->accommodation_type}} </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-3 font-weight-bold pr-5">Eigenes Zimmer</div>
                            <div class="col-sm-9">{{ optional($user->profile)->own_room}} </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-3 font-weight-bold pr-5">Haustiere</div>
                            <div class="col-sm-9">{{ optional($user->profile)->pets}} </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-3 font-weight-bold pr-5">Barrierefreiheit</div>
                            <div class="col-sm-9">{{ optional($user->profile)->accessibility}} </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-3 font-weight-bold pr-5">Mitbewohner/Familie</div>
                            <div class="col-sm-9">{{ optional($user->profile)->number_of_persons}} </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-3 font-weight-bold pr-5">Rauchen</div>
                            <div class="col-sm-9">{{ optional($user->profile)->accepts_smoker}} </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-3 font-weight-bold pr-5">Maximale Übernachtungslänge</div>
                            <div class="col-sm-9">{{ optional($user->profile)->length_of_stay}} Tag(e) </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-3 font-weight-bold pr-5">Als Gastgeber stelle ich Folgendes</div>
                            <div class="col-sm-9">
                                <ul class="flat_description">
                                    <li>WLAN</li>
                                    <li>Eigenes Zimmer</li>
                                </ul>
                                {{ optional($user->profile)->offer_as_host}}
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-3 font-weight-bold pr-5">Beschreibung der Übernachtung</div>
                            <div class="col-sm-9">{{ optional($user->profile)->accommodation_other ?? '-'}}</div>
                        </div>
                    </div>
                    <div id="comments" class="tab-pane fade">
                        <div class="media border p-3">
                            <img src="https://www.w3schools.com/bootstrap4/img_avatar3.png" alt="John Doe" class="mr-3 mt-3 rounded-circle" style="width:60px;">
                            <div class="media-body">
                                <h4>Katharina <small><i>Geschriebem am February 19, 2016</i></small></h4>
                                <p>Die Übernachtungs bei dir war toll! Vielen Dank!</p>
                            </div>
                        </div>
                        <div class="media border p-3">
                            <img src="https://www.w3schools.com/bootstrap4/img_avatar3.png" alt="John Doe" class="mr-3 mt-3 rounded-circle" style="width:60px;">
                            <div class="media-body">
                                <h4>Markus <small><i>Geschriebem am February 19, 2016</i></small></h4>
                                <p>Die Übernachtungs bei dir war toll! Vielen Dank!</p>
                            </div>
                        </div>

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
        #mapid { min-height: 300px; }
    </style>
@endsection

@push('scripts')
    <!-- Make sure you put this AFTER Leaflet's CSS -->
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"
            integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA=="
            crossorigin=""></script>

    <script>
        var mymap = L.map('mapid').setView([52.52, 13.45], 15);
        //var marker = L.marker([52.52, 13.45]).addTo(mymap);

        /*        var popup = L.popup();
                function onMapClick(e) {
                    popup
                        .setLatLng(e.latlng)
                        .setContent("You clicked the map at " + e.latlng.toString())
                        .openOn(mymap);
                }
                mymap.on('click', onMapClick);*/

        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(mymap);
        {{--
        var map = L.map('mapid').setView([{{ config('leaflet.map_center_latitude') }}, {{ config('leaflet.map_center_longitude') }}], {{ config('leaflet.zoom_level') }});
        var baseUrl = "{{ url('/') }}";

        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map);

        axios.get('{{ route('api.outlets.index') }}')
            .then(function (response) {
                console.log(response.data);
                L.geoJSON(response.data, {
                    pointToLayer: function(geoJsonPoint, latlng) {
                        return L.marker(latlng);
                    }
                })
                    .bindPopup(function (layer) {
                        return layer.feature.properties.map_popup_content;
                    }).addTo(map);
            })
            .catch(function (error) {
                console.log(error);
            });

        @can('create', new App\Outlet)
        var theMarker;

        map.on('click', function(e) {
            let latitude = e.latlng.lat.toString().substring(0, 15);
            let longitude = e.latlng.lng.toString().substring(0, 15);

            if (theMarker != undefined) {
                map.removeLayer(theMarker);
            };

            var popupContent = "Your location : " + latitude + ", " + longitude + ".";
            popupContent += '<br><a href="{{ route('outlets.create') }}?latitude=' + latitude + '&longitude=' + longitude + '">Add new outlet here</a>';

            theMarker = L.marker([latitude, longitude]).addTo(map);
            theMarker.bindPopup(popupContent)
                .openPopup();
        });
        @endcan--}}
    </script>
@endpush
