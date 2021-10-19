@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif
                <form action="/profile/{{$user->username}}" enctype="multipart/form-data" method="post">
                    @csrf
                    @method('PATCH')
                    <div class="row">
                        <div class="col-12  ">
                            <div class="row">
                                <h1>Mein Profil bearbeiten</h1>
                            </div>
                            <ul class="nav nav-tabs mb-3">
                                <li class="nav-item">
                                    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Über mich</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="couch-tab" data-toggle="tab" href="#couch" role="tab" aria-controls="home" aria-selected="true">Übernachtung</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="work-tab" data-toggle="tab" href="#work" role="tab" aria-controls="home" aria-selected="true">Berufliches</a>
                                </li>
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                    <div class="form-group row">
                                        <label for="is_host" class="col-md-4 col-form-label">Möchtest du Gastgeber*in sein?</label>
                                        <p>
                                            <input type="radio" id="is_host" name="is_host" value="1" checked>
                                            <label for="is_host">Ja</label><br>
                                            <input type="radio" id="is_host" name="is_host" value="0" >
                                            <label for="is_host">Nein</label><br>
                                        </p>
                                    </div>
                                    <div class="form-group row">
                                        <label for="plz" class="col-md-4 col-form-label">Deine Postleitzahl</label>
                                        <p>
                                            <input type="number" id="plz" name="plz" value="{{old('plz') ?? $user->profile->plz}}">
                                        </p>
                                    </div>

{{--                                Latitude und Longitude Felder werden über Leaflet befüllt und nicht angezeigt.--}}
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <input hidden id="latitude" type="text" class="form-control{{ $errors->has('latitude') ? ' is-invalid' : '' }}" name="latitude" value="{{ old('latitude') ?? $user->profile->latitude }}">
                                                {!! $errors->first('latitude', '<span class="invalid-feedback" role="alert">:message</span>') !!}
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <input hidden id="longitude" type="text" class="form-control{{ $errors->has('longitude') ? ' is-invalid' : '' }}" name="longitude" value="{{ old('longitude')?? $user->profile->longitude }}">
                                                {!! $errors->first('longitude', '<span class="invalid-feedback" role="alert">:message</span>') !!}
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="birthday" class="col-md-4 col-form-label">Karte (Bitte bewege den Marker um den
                                            ungefähren Standort deiner Übernachtungsmöglichkeit anzugeben)</label>
                                        <div id="mapid"></div>
                                    </div>


                                    <div class="form-group row">
                                        <label for="is_host" class="col-md-4 col-form-label">Bitte wähle dein Geschlecht</label>
                                        <p>
                                            <input type="radio" id="female" name="gender" value="female">
                                            <label for="female">Weiblich</label><br>
                                            <input type="radio" id="male" name="gender" value="male">
                                            <label for="male">Männlich</label><br>
                                            <input type="radio" id="other" name="gender" value="other" checked>
                                            <label for="other">Divers</label>
                                        </p>
                                    </div>
                                    <div class="form-group row">
                                        <label for="birthday" class="col-md-4 col-form-label">Dein Geburtsdatum</label>
                                        <p>
                                            <input type="date" id="birthday" name="birthday" value="{{old('birthday') ?? $user->profile->birthday}}">
                                        </p>
                                        <input type="checkbox" id="no_birthday" name="no_birthday" value="no_birthday">
                                        <label for="no_birthday">Mein Alter soll im Profil nicht angezeigt werden.</label><br>
                                    </div>
                                    <div class="form-group row">
                                        <label for="profile_title" class="col-md-4 col-form-label">Deine Kurzbeschreibung (dieser Text wird in der Suche angezeigt)</label>
                                        <input id="profile_title"
                                               type="text"
                                               class="form-control{{$errors->has('profile_title') ? 'is-invalid' : ''}}"
                                               name="profile_title"
                                               value="{{old('profile_title') ?? $user->profile->profile_title}}"
                                               autocomplete="profile_title" autofocus>
                                        @if ($errors->has('profile_title'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{$errors->first('profile_title')}}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    <div class="form-group row">
                                        <label for="profile_description" class="col-md-4 col-form-label">Beschreibe Dich (dieser Text ist durchsuchbar)</label>
                                        <textarea id="profile_description"
                                                  type="text"
                                                  class="form-control{{$errors->has('profile_description') ? 'is-invalid' : ''}}"
                                                  name="profile_description"
                                                  rows="5"
                                                  autocomplete="profile_description" autofocus>
                                            {{ $user->profile->profile_description}}
                                        </textarea>
                                        @if ($errors->has('profile_description'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{$errors->first('profile_description')}}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    <div class="row">
                                        <label for="image" class="col-md-4 col-form-label">Profilbild</label>
                                        <input type="file" class="form-control-file" id="image" name="image">
                                        @if ($errors->has('image'))
                                            <strong>{{$errors->first('image')}}</strong>
                                        @endif
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="couch">
                                    <div class="form-group row">
                                        <label for="length_of_stay" class="col-md-4 col-form-label">Maximale Übernachtungslänge in Tagen</label>
                                        <div class="col-sm-3">
                                            <input id="length_of_stay"
                                                   type="number"
                                                   class="form-control{{$errors->has('length_of_stay') ? 'is-invalid' : ''}}"
                                                   name="length_of_stay"
                                                   value="{{old('length_of_stay') ?? $user->profile->length_of_stay}}"
                                                   autocomplete="length_of_stay" autofocus>
                                            @if ($errors->has('length_of_stay'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{$errors->first('length_of_stay')}}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="number_of_persons" class="col-md-4 col-form-label">Anzahl Mitbewohner / Familienmitglieder</label>
                                        <div class="col-sm-3">
                                            <input id="number_of_persons"
                                                   type="number"
                                                   class="form-control{{$errors->has('number_of_persons') ? 'is-invalid' : ''}}"
                                                   name="number_of_persons"
                                                   value="{{old('number_of_persons') ?? $user->profile->number_of_persons}}"
                                                   autocomplete="number_of_persons" autofocus>
                                            @if ($errors->has('number_of_persons'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{$errors->first('number_of_persons')}}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="offer_as_host[]" class="col-md-4 col-form-label">Als Gastgeber stelle ich Folgendes</label>
                                        <input id="offer_as_host[]"
                                               type="text"
                                               class="form-control{{$errors->has('offer_as_host[]') ? 'is-invalid' : ''}}"
                                               name="offer_as_host[]"
                                               value="{{old('offer_as_host[0]') ?? $user->profile->offer_as_host[0]}}"
                                               autocomplete="offer_as_host" autofocus
                                               placeholder="Freitext">
                                        @if ($errors->has('offer_as_host[]'))
                                            <span class="invalid-feedback" role="alert">
                                            <strong>{{$errors->first('offer_as_host[]')}}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <div class="form-check">
                                                <label class="form-check-label">
                                                    <input type="checkbox" class="form-check-input" name="offer_as_host[]" value="WLAN"
                                                           @if(is_array(old('offer_as_host')) && in_array("WLAN", old('$user->profile->offer_as_host'))) checked @endif>WLAN
{{--                                                    {{ (is_array(old('offer_as_host')) and in_array("WLAN", old('offer_as_host'))) ? ' checked' : '' }}>WLAN--}}
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <label class="form-check-label">
                                                    <input type="checkbox" class="form-check-input" name="offer_as_host[]" value="TV"
                                                           @if(is_array(old('offer_as_host')) && in_array("TV", old('offer_as_host'))) checked @endif>TV
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <label class="form-check-label">
                                                    <input type="checkbox" class="form-check-input" name="offer_as_host[]"  value="Küche">Küche
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <label class="form-check-label">
                                                    <input type="checkbox" class="form-check-input"  name="offer_as_host[]" value="Küchenmitbenutzung">Küchenmitbenutzung
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <label class="form-check-label">
                                                    <input type="checkbox" class="form-check-input" name="offer_as_host[]"  value="Handtücher">Handtücher
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <label class="form-check-label">
                                                    <input type="checkbox" class="form-check-input" name="offer_as_host[]"  value="Bettwäsche">Bettwäsche
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <label class="form-check-label">
                                                    <input type="checkbox" class="form-check-input" name="offer_as_host[]"  value="Parkplatz">Parkplatz
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col">

                                            <div class="form-check">
                                                <label class="form-check-label">
                                                    <input type="checkbox" class="form-check-input" name="offer_as_host[]"  value="Fahrrad">Fahrrad
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <label class="form-check-label">
                                                    <input type="checkbox" class="form-check-input" name="offer_as_host[]"  value="Föhn">Föhn
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <label class="form-check-label">
                                                    <input type="checkbox" class="form-check-input" name="offer_as_host[]"  value="Terrasse oder Balkon">Terrasse oder Balkon
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <label class="form-check-label">
                                                    <input type="checkbox" class="form-check-input" name="offer_as_host[]"  value="Waschmaschine">Waschmaschine
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <label class="form-check-label">
                                                    <input type="checkbox" class="form-check-input"  name="offer_as_host[]" value="Bügeleisen">Bügeleisen
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <label class="form-check-label">
                                                    <input type="checkbox" class="form-check-input" name="offer_as_host[]"  value="Arbeitsplatz">Arbeitsplatz
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <label class="form-check-label">
                                                    <input type="checkbox" class="form-check-input" name="offer_as_host[]"  value="Eigenes Bad">Eigenes Bad
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <label class="form-check-label">
                                                    <input type="checkbox" class="form-check-input" name="offer_as_host[]"  value="Badezimmermitbenutzung">Badezimmermitbenutzung
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="accommodation_description" class="col-md-4 col-form-label">Rauchen?</label>
                                        <div class="form-check">
                                            <label class="form-check-label" for="accepts_smoker">
                                                <input type="radio" class="form-check-input" id="radio1" name="accepts_smoker" value="option1" checked>Ja
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <label class="form-check-label" for="accepts_smoker">
                                                <input type="radio" class="form-check-input" id="radio2" name="accepts_smoker" value="option2">Nein
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <label class="form-check-label" for="accepts_smoker">
                                                <input type="radio" class="form-check-input" id="radio3" name="accepts_smoker" value="option3" >Ja, auf Balkon/Terrasse
                                            </label>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="accommodation_description" class="col-md-4 col-form-label">Beschreibung der Übernachtung</label>
                                        <textarea id="accommodation_description"
                                                  type="text"
                                                  class="form-control{{$errors->has('accommodation_description') ? 'is-invalid' : ''}}"
                                                  name="accommodation_description"
                                                  rows = "5"
                                                  autocomplete="accommodation_description" autofocus>
                                        {{ $user->profile->accommodation_description }}
                                        </textarea>
                                        @if ($errors->has('accommodation_description'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{$errors->first('accommodation_description')}}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    <div class="form-group row">
                                        <label for="accommodation_type" class="col-md-4 col-form-label">Meine Übernachtungsmöglichkeit</label>
                                        <select multiple class="form-control" id="accommodation_type" name="accommodation_type">
                                            <option>eigenes Bett</option>
                                            <option>Etagenbett</option>
                                            <option>(Schlaf-)Sofa</option>
                                            <option>Luftmatratze</option>
                                            <option>eigenes Zimmer</option>
                                            <option>Wohnwagen/-mobil</option>
                                            <option>Einliegerwohnung</option>
                                            <option>Ganze Wohnung</option>
                                            <option>Ganzes Haus</option>
                                            <option>Stellplatz Zelt</option>
                                            <option>Stellplatz Wohnwagen/Wohnmobil</option>
                                        </select>
                                    </div>
                                    <div class="form-group row">
                                        <label for="pets" class="col-md-4 col-form-label">Haustiere</label>
                                        <select multiple class="form-control" id="pets" name="pets">
                                            <option>Keins</option>
                                            <option>Hund</option>
                                            <option>Katze</option>
                                            <option>Andere (bitte in der Beschreibung spezifizieren)</option>
                                        </select>
                                    </div>
                                    <div class="form-group row">
                                        <label for="accessibility" class="col-md-4 col-form-label">Barrierefreiheit</label>
                                        <select multiple class="form-control" id="accessibility" name="accessibility">
                                            <option>Die Wohnung ist rollstuhlgerecht.</option>
                                            <option>Ein Aufzug ist vorhanden.</option>
                                            <option>Der Zugang ist barrierefrei.</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="work">
                                    <div class="form-group row">
                                        <label for="professional_description" class="col-md-4 col-form-label">Was ich beruflich mache</label>
                                        <textarea id="professional_description"
                                                  type="text"
                                                  class="form-control{{$errors->has('professional_description') ? 'is-invalid' : ''}}"
                                                  name="professional_description"
                                                  rows="5"
                                                  autocomplete="professional_description" autofocus>
                                            {{$user->profile->professional_description}}
                                        </textarea>
{{--                                        <input id="professional_description"--}}
{{--                                               type="text"--}}
{{--                                               class="form-control{{$errors->has('professional_description') ? 'is-invalid' : ''}}"--}}
{{--                                               name="professional_description"--}}
{{--                                               value="{{old('professional_description') ?? $user->profile->professional_description}}"--}}
{{--                                               autocomplete="professional_description" autofocus>--}}
{{--                                        @if ($errors->has('professional_description'))--}}
{{--                                            <span class="invalid-feedback" role="alert">--}}
{{--                                            <strong>{{$errors->first('professional_description')}}</strong>--}}
{{--                                        </span>--}}
{{--                                        @endif--}}
                                    </div>
                                    <div class="form-group row">
                                        <label for="professional_offer" class="col-md-4 col-form-label">Was ich anbieten kann</label>
                                        <select multiple class="form-control" id="professional_offer" name="professional_offer">
                                            <option>Führung örtliche ÖB</option>
                                            <option>Führung örtliche WB</option>
                                            <option>Führung örtliches Archiv</option>
                                            <option>Führung örtliches Museum</option>
                                            <option>Führung örtliche Informationseinrichtung</option>
                                        </select>
<!--                                            <input id="professional_offer"
                                               type="text"
                                               class="form-control{{$errors->has('professional_offer') ? 'is-invalid' : ''}}"
                                               name="professional_offer"
                                               value="{{old('professional_offer') ?? $user->profile->accommodation_other}}"
                                               autocomplete="accommodation_other" autofocus>
                                        @if ($errors->has('professional_offer'))
                                            <span class="invalid-feedback" role="alert">
                                            <strong>{{$errors->first('professional_offer')}}</strong>
                                            </span>
                                        @endif-->
                                    </div>
                                </div>

                            </div>

                            <div class="row pt-4">
                                <button class="btn btn-primary">Profil ändern</button>
                            </div>
                        </div>
                    </div>
                </form>
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
            min-height: 300px;
            width:50%;
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
        var mapCenter = [{{ request('latitude', config('leaflet.map_center_latitude')) }}, {{ request('longitude', config('leaflet.map_center_longitude')) }}];
        {{--var map = L.map('mapid').setView(mapCenter, {{ config('leaflet.zoom_level') }});--}}
        var map = L.map('mapid').setView([51.4567, 10.5033], 5);
        map.invalidateSize();

        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map);

        var marker = L.marker([{{$user->profile->latitude ?? 50.9446596}}, {{$user->profile->longitude ?? 10.3226091}}],{
                        draggable: true
        }).addTo(map);

        marker.on('dragend', function (e) {
        document.getElementById('latitude').value = marker.getLatLng().lat;
        document.getElementById('longitude').value = marker.getLatLng().lng;
    });
</script>
@endpush
