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
{{--                {{$user ->username}}--}}
                <form action="/profile/{{$user->id}}" enctype="multipart/form-data" method="post">
                    @csrf
                    @method('PATCH')
                    <div class="row">
                        <div class="col-12  ">
                            <div class="row">
                                <h1>Mein Profil bearbeiten</h1>
                            </div>
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
                                        <label for="profile_title" class="col-md-4 col-form-label">Profiltitel</label>
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
                                        <label for="profile_description" class="col-md-4 col-form-label">Beschreibung</label>
                                        <input id="description"
                                               type="text"
                                               class="form-control{{$errors->has('profile_description') ? 'is-invalid' : ''}}"
                                               name="profile_description"
                                               value="{{old('profile_description') ?? $user->profile->profile_description}}"
                                               autocomplete="description" autofocus>
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
                                    <div class="form-group row">
                                        <label for="number_of_persons" class="col-md-4 col-form-label">Anzahl Mitbewohner / Familienmitglieder</label>
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
                                    <div class="form-group row">
                                        <label for="offer_as_host" class="col-md-4 col-form-label">Als Gastgeber stelle ich Folgendes</label>
<!--                                        <input id="offer_as_host"
                                               type="text"
                                               class="form-control{{$errors->has('offer_as_host') ? 'is-invalid' : ''}}"
                                               name="offer_as_host"
                                               value="{{old('offer_as_host') ?? $user->profile->offer_as_host}}"
                                               autocomplete="offer_as_host" autofocus>
                                        @if ($errors->has('offer_as_host'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{$errors->first('offer_as_host')}}</strong>
                                            </span>
                                        @endif-->
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <div class="form-check">
                                                <label class="form-check-label">
                                                    <input type="checkbox" class="form-check-input" value="wlan">WLAN
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <label class="form-check-label">
                                                    <input type="checkbox" class="form-check-input" value="tv">TV
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <label class="form-check-label">
                                                    <input type="checkbox" class="form-check-input" value="">Küche
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <label class="form-check-label">
                                                    <input type="checkbox" class="form-check-input" value="wlan">WLAN
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <label class="form-check-label">
                                                    <input type="checkbox" class="form-check-input" value="tv">TV
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <label class="form-check-label">
                                                    <input type="checkbox" class="form-check-input" value="">Küche
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <label class="form-check-label">
                                                    <input type="checkbox" class="form-check-input" value="wlan">Küchenmitbenutzung
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <label class="form-check-label">
                                                    <input type="checkbox" class="form-check-input" value="tv">Handtücher
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <label class="form-check-label">
                                                    <input type="checkbox" class="form-check-input" value="">Bettwäsche
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <label class="form-check-label">
                                                    <input type="checkbox" class="form-check-input" value="wlan">Parkplatz
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col">

                                            <div class="form-check">
                                                <label class="form-check-label">
                                                    <input type="checkbox" class="form-check-input" value="tv">Fahrrad
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <label class="form-check-label">
                                                    <input type="checkbox" class="form-check-input" value="">Föhn
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <label class="form-check-label">
                                                    <input type="checkbox" class="form-check-input" value="wlan">Parkplatz
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <label class="form-check-label">
                                                    <input type="checkbox" class="form-check-input" value="wlan">Terrasse oder Balkon
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <label class="form-check-label">
                                                    <input type="checkbox" class="form-check-input" value="tv">Waschmaschine
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <label class="form-check-label">
                                                    <input type="checkbox" class="form-check-input" value="">Bügeleisen
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <label class="form-check-label">
                                                    <input type="checkbox" class="form-check-input" value="">Arbeitsplatz
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <label class="form-check-label">
                                                    <input type="checkbox" class="form-check-input" value="">Eigenes Bad
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <label class="form-check-label">
                                                    <input type="checkbox" class="form-check-input" value="">Badezimmermitbenutzung
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
                                        <input id="accommodation_description"
                                               type="text"
                                               class="form-control{{$errors->has('accommodation_description') ? 'is-invalid' : ''}}"
                                               name="accommodation_description"
                                               value="{{old('accommodation_description') ?? $user->profile->accommodation_other}}"
                                               autocomplete="accommodation_description" autofocus>
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
                                            <option>Keins</option>
                                            <option>Hund</option>
                                            <option>Katze</option>
                                            <option>Andere (bitte in der Beschreibung spezifizieren)</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="work">
                                    <div class="form-group row">
                                        <label for="professional_description" class="col-md-4 col-form-label">Was ich beruflich mache</label>
                                        <input id="professional_description"
                                               type="text"
                                               class="form-control{{$errors->has('professional_description') ? 'is-invalid' : ''}}"
                                               name="professional_description"
                                               value="{{old('professional_description') ?? $user->profile->professional_description}}"
                                               autocomplete="professional_description" autofocus>
                                        @if ($errors->has('professional_description'))
                                            <span class="invalid-feedback" role="alert">
                                            <strong>{{$errors->first('professional_description')}}</strong>
                                        </span>
                                        @endif
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
