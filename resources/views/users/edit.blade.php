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
                <form action="/user/{{$user->username}}" enctype="multipart/form-data" method="post">
                    @csrf
                    @method('PATCH')
                    <div class="row">
                        <div class="col-12  ">
                            <div class="row">
                                <h1>Meinen Account bearbeiten</h1>
                            </div>

                            <div class="row pt-4">
                                <button class="btn btn-primary">Account löschen</button>
                            </div>
                            Achtung, diese Aktion kann nicht rückgängig gemacht werden. Alle Daten werden gelöscht.
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
