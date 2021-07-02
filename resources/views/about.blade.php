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
                <h1><a name="über-openbnbib" class="md-header-anchor"></a><span>Über OpenBnBib</span></h1><p><span>OpenBnBib
                        ist eine kostenlose Übernachtungsplattform für von und für Personen, die in Bibliotheken, Archiven und
                        anderen Informationseinrichtungen arbeiten.</span></p><p><span>Die Idee spukte bereits seit einigen Jahren
                        in den Köpfen einzelner BIB-Aktiven. Es dauerte dann noch bis zum BibCamp 2019 in Köln, um eine kleine Gruppe
                        von engagierten Berufskolleg:innen zu finden, die sich an die Umsetzung machten. Dazu gehörten Tom Becker,
                        Jan Jäger und Sonja von Mach.</span></p><p><span>Anfang 2020 – zum denkbar ungünstigsten Zeitpunkt für eine
                        Übernachtungsplattform – wurde dann mit der Entwicklung begonnen. Die Ausgestaltung der Plattform wurde zunächst
                        von Katharina Klausner im Rahmen ihrer Masterarbeit übernommen.</span></p><p><span>[Zeitpunkt nachtragen] startete
                        OpenBnBib dann offiziell.</span></p><p><span>Unsere Grundsätze lauten:</span></p><ul><li><span>OpenBnBib ist
                            frei zugänglich.</span></li><li><span>OpenBnBib ist nicht kommerziell.</span></li><li><span>Alle originären
                            Inhalte in OpenBnBib stehen unter CC-BY.</span></li></ul><p><span>Aktuell wird die Plattform von folgenden
                        Personen gepflegt: Jan Jäger, Katharina Klausner, Sonja von Mach und Sabrina Ramünke.</span></p><p><span>Die
                        Betriebskosten werden vom </span><a href='https://www.vdb-online.org/'><span>Verein Deutscher Bibliothekarinnen
                            und Bibliothekare (VDB)</span></a> und vom <a href='https://www.bib-info.de/'>Berufsverband Information Bibliothek (BIB)</a> <span> getragen. Herzlichen Dank!</span></p>

            </div>
        </div>

    </div>
@endsection
