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
            </div>

            <div class="col-sm-12">
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
            </div>
        </div>

    </div>
@endsection
