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
                        <p><a href="/profile/{{ $user->username }}/edit">{{ __('Mein Profil bearbeiten') }}</a></p>
                    @else
                        <a href="/messages/create/{{ $user->username }}" class="btn btn-outline-info" role="button" aria-pressed="true">Schreibe eine Nachricht</a>
                        <button type="button" class="btn btn-outline-info" data-toggle="modal" data-target="#commentsModal">Ins Gästebuch schreiben </button>
                    @endcan


            </div>
            <div class="col-sm-12">
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
                    <li class="nav-item">
                        <a class="nav-link" id="comments-tab" data-toggle="tab" href="#comments" role="tab" aria-controls="home" aria-selected="true">Mein Gästebuch</a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                        <div class="row">
                            <div class="col-sm-3 font-weight-bold pr-5">Kurzbeschreibung</div>
                            <div class="col-sm-9">{{ $user->profile->profile_title ?? 'Schreibe hier eine kurzen Text! Er wird in der Suche angezeigt.'}}</div>
                        </div>
                        <div class="row">
                            <div class="col-sm-3 font-weight-bold pr-5">Über mich</div>
                            <div class="col-sm-9">{{ optional($user->profile)->profile_description}}</div>
                        </div>
                        <div class="row">
                            <div class="col-sm-3 font-weight-bold pr-5">Wohnort</div>
                            <div class="col-sm-9">{{ optional($user->profile)->plz}} {{ optional($user->profile)->location}}</div>
                        </div>
                        <div class="row">
                            <div class="col-sm-3 font-weight-bold pr-5">Karte</div>
                            <div class="col-sm-9">
                                <div class="card-body" id="mapid"></div>
                            </div>
                        </div>
                    </div>

                    <div id="couch" class="tab-pane fade">

                        <div class="row">
                            <div class="col-sm-3 font-weight-bold pr-5">Beschreibung der Übernachtung</div>
                            <div class="col-sm-9">{{ optional($user->profile)->accommodation_description}}</div>
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

                        @if (count((array) $user->profile->offer_as_host)>0)
                        <div class="row mt-lg-3">
                            <div class="col-sm-3 font-weight-bold pr-5">Als Gastgeber stelle ich Folgendes</div>
                            <div class="col-sm-9">
                                <ul class="flat_description">
                                    @foreach((array) $user->profile->offer_as_host as $offer)
                                        <li>{{ $offer }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        @endif

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
{{--                    @if( Session::has( 'success' ))--}}
{{--                        <p class="alert alert-info">{{ Session::get('success') }}</p>--}}
{{--                    @endif--}}
                    <div id="comments" class="tab-pane fade">
                        @foreach($user->profile->comments as $comment)
                            <div class="media border p-3">
                                @if(!empty($comment->user))
                                    <img src="{{$comment->user->profile->profileImage() }}" class="mr-3 image-cropper rounded-circle " style="max-height: 50px; max-width:50px;" alt="Profilbild">
                                @else
{{--                                    Standardbild, falls der User schon gelöscht ist--}}
                                    <img src="https://upload.wikimedia.org/wikipedia/commons/1/12/User_icon_2.svg">
                                @endif
                                <div class="media-body">
                                @if(!empty($comment->user))
                                    <h4><a href="/profile/{{$comment->user->username ?? ''}} ">{{$comment->user->firstname }}</a> <small><i> Geschrieben am {{$comment->created_at->format('d.m.Y')}}</i></small></h4>
                                @else
                                    <h4> Gelöschter Nutzer <small><i> Geschrieben am {{$comment->created_at->format('d.m.Y')}}</i></small></h4>
                                @endif
                                <p> {{ $comment->message }} </p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <!-- The Modal -->
            <form action {{'CommentsController@store'}} method="POST">
{{--            <form>--}}
                @csrf
                <div class="modal" id="commentsModal">
                <div class="modal-dialog">
                    <div class="modal-content">

                        <!-- Modal Header -->
                        <div class="modal-header">
                            <h4 class="modal-title">Schreibe ins Gästebuch von {{  __($user->firstname) }}</h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>

                        <!-- Modal body -->
                        <div class="modal-body">
                            <div class="form-group">
                                <textarea class="form-control" rows="7" name="message" id="message">Deine Nachricht</textarea>
                            </div>
                            <div class="form-group">
                                <textarea class="form-control" rows="0" name="profile_id" id="profile_id" hidden>{{ __($user->profile->id) }}</textarea>
                            </div>
                        </div>

                        <!-- Modal footer -->
                        <div class="modal-footer">
                            Möchtest Du die Nachricht so senden? Achtung: Änderungen sind nicht möglich!
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Abbrechen</button>
                            <button type="submit" class="btn btn-success">Senden</button>
                        </div>

                    </div>
                </div>
            </div>
            </form>
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
        var mapCenter = [{{ request('latitude', config('leaflet.map_center_latitude')) }}, {{ request('longitude', config('leaflet.map_center_longitude')) }}];
        {{--var map = L.map('mapid').setView(mapCenter, {{ config('leaflet.zoom_level') }});--}}
        var map = L.map('mapid').setView([{{$user->profile->latitude}}, {{$user->profile->longitude}}], 7);
        map.invalidateSize();

        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map);
        L.marker([{{$user->profile->latitude}}, {{$user->profile->longitude}}]).addTo(map);

    </script>
@endpush
