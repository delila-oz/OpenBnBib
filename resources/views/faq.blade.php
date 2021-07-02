<style>
    #write {
        max-width: 860px;
        margin: 0 auto;
        padding: 30px;
        padding-bottom: 100px;
    }

    @media only screen and (min-width: 1400px) {
        #write {
            max-width: 1024px;
        }
    }

    @media only screen and (min-width: 1800px) {
        #write {
            max-width: 1200px;
        }
    }

    #write > ul:first-child,
    #write > ol:first-child{
        margin-top: 30px;
    }

    a {
        color: #4183C4;
    }
    h1,
    h2,
    h3,
    h4,
    h5,
    h6 {
        position: relative;
        margin-top: 1rem;
        margin-bottom: 1rem;
        font-weight: bold;
        line-height: 1.4;
        cursor: text;
    }
    h1:hover a.anchor,
    h2:hover a.anchor,
    h3:hover a.anchor,
    h4:hover a.anchor,
    h5:hover a.anchor,
    h6:hover a.anchor {
        text-decoration: none;
    }
    h1 tt,
    h1 code {
        font-size: inherit;
    }
    h2 tt,
    h2 code {
        font-size: inherit;
    }
    h3 tt,
    h3 code {
        font-size: inherit;
    }
    h4 tt,
    h4 code {
        font-size: inherit;
    }
    h5 tt,
    h5 code {
        font-size: inherit;
    }
    h6 tt,
    h6 code {
        font-size: inherit;
    }
    h1 {
        font-size: 2.25em;
        line-height: 1.2;
        border-bottom: 1px solid #eee;
    }
    h2 {
        font-size: 1.75em;
        line-height: 1.225;
        border-bottom: 1px solid #eee;
    }

    /*@media print {
        .typora-export h1,
        .typora-export h2 {
            border-bottom: none;
            padding-bottom: initial;
        }

        .typora-export h1::after,
        .typora-export h2::after {
            content: "";
            display: block;
            height: 100px;
            margin-top: -96px;
            border-top: 1px solid #eee;
        }
    }*/

    h3 {
        font-size: 1.5em;
        line-height: 1.43;
    }
    h4 {
        font-size: 1.25em;
    }
    h5 {
        font-size: 1em;
    }
    h6 {
        font-size: 1em;
        color: #777;
    }
    p,
    blockquote,
    ul,
    ol,
    dl,
    table{
        margin: 0.8em 0;
    }
    li>ol,
    li>ul {
        margin: 0 0;
    }
    hr {
        height: 2px;
        padding: 0;
        margin: 16px 0;
        background-color: #e7e7e7;
        border: 0 none;
        overflow: hidden;
        box-sizing: content-box;
    }

    li p.first {
        display: inline-block;
    }
    ul,
    ol {
        padding-left: 30px;
    }
    ul:first-child,
    ol:first-child {
        margin-top: 0;
    }
    ul:last-child,
    ol:last-child {
        margin-bottom: 0;
    }
    blockquote {
        border-left: 4px solid #dfe2e5;
        padding: 0 15px;
        color: #777777;
    }
    blockquote blockquote {
        padding-right: 0;
    }
    table {
        padding: 0;
        word-break: initial;
    }
    table tr {
        border-top: 1px solid #dfe2e5;
        margin: 0;
        padding: 0;
    }
    table tr:nth-child(2n),
    thead {
        background-color: #f8f8f8;
    }
    table th {
        font-weight: bold;
        border: 1px solid #dfe2e5;
        border-bottom: 0;
        margin: 0;
        padding: 6px 13px;
    }
    table td {
        border: 1px solid #dfe2e5;
        margin: 0;
        padding: 6px 13px;
    }
    table th:first-child,
    table td:first-child {
        margin-top: 0;
    }
    table th:last-child,
    table td:last-child {
        margin-bottom: 0;
    }

    .CodeMirror-lines {
        padding-left: 4px;
    }

    .code-tooltip {
        box-shadow: 0 1px 1px 0 rgba(0,28,36,.3);
        border-top: 1px solid #eef2f2;
    }

    .md-fences,
    code,
    tt {
        border: 1px solid #e7eaed;
        background-color: #f8f8f8;
        border-radius: 3px;
        padding: 0;
        padding: 2px 4px 0px 4px;
        font-size: 0.9em;
    }

    code {
        background-color: #f3f4f4;
        padding: 0 2px 0 2px;
    }

    .md-fences {
        margin-bottom: 15px;
        margin-top: 15px;
        padding-top: 8px;
        padding-bottom: 6px;
    }


    .md-task-list-item > input {
        margin-left: -1.3em;
    }

    @media print {
        html {
            font-size: 13px;
        }
        table,
        pre {
            page-break-inside: avoid;
        }
        pre {
            word-wrap: break-word;
        }
    }

    .md-fences {
        background-color: #f8f8f8;
    }
    #write pre.md-meta-block {
        padding: 1rem;
        font-size: 85%;
        line-height: 1.45;
        background-color: #f7f7f7;
        border: 0;
        border-radius: 3px;
        color: #777777;
        margin-top: 0 !important;
    }

    .mathjax-block>.code-tooltip {
        bottom: .375rem;
    }

    .md-mathjax-midline {
        background: #fafafa;
    }

    #write>h3.md-focus:before{
        left: -1.5625rem;
        top: .375rem;
    }
    #write>h4.md-focus:before{
        left: -1.5625rem;
        top: .285714286rem;
    }
    #write>h5.md-focus:before{
        left: -1.5625rem;
        top: .285714286rem;
    }
    #write>h6.md-focus:before{
        left: -1.5625rem;
        top: .285714286rem;
    }
    .md-image>.md-meta {
        /*border: 1px solid #ddd;*/
        border-radius: 3px;
        padding: 2px 0px 0px 4px;
        font-size: 0.9em;
        color: inherit;
    }

    .md-tag {
        color: #a7a7a7;
        opacity: 1;
    }

    .md-toc {
        margin-top:20px;
        padding-bottom:20px;
    }

    .sidebar-tabs {
        border-bottom: none;
    }

    #typora-quick-open {
        border: 1px solid #ddd;
        background-color: #f8f8f8;
    }

    #typora-quick-open-item {
        background-color: #FAFAFA;
        border-color: #FEFEFE #e5e5e5 #e5e5e5 #eee;
        border-style: solid;
        border-width: 1px;
    }

    /** focus mode */
    .on-focus-mode blockquote {
        border-left-color: rgba(85, 85, 85, 0.12);
    }

    header, .context-menu, .megamenu-content, footer{
        font-family: "Segoe UI", "Arial", sans-serif;
    }

    .file-node-content:hover .file-node-icon,
    .file-node-content:hover .file-node-open-state{
        visibility: visible;
    }

    .mac-seamless-mode #typora-sidebar {
        background-color: #fafafa;
        background-color: var(--side-bar-bg-color);
    }

    .md-lang {
        color: #b4654d;
    }

    .html-for-mac .context-menu {
        --item-hover-bg-color: #E6F0FE;
    }

    #md-notification .btn {
        border: 0;
    }

    .dropdown-menu .divider {
        border-color: #e5e5e5;
    }

    .ty-preferences .window-content {
        background-color: #fafafa;
    }

    .ty-preferences .nav-group-item.active {
        color: white;
        background: #999;
    }
</style>
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

            <div id='write'  class=''><h1><a name="faq" class="md-header-anchor"></a><span>FAQ</span></h1><p><a href='#was-ist-openbnbib'><span>Was ist OpenBnBib?</span></a></p><p><a href='#wie-kann-ich-eine-übernachtungsmöglichkeit-wahrnehmen'><span>Wie kann ich eine Übernachtungsmöglichkeit wahrnehmen?</span></a></p><p><a href='#wie-kann-ich-eine-übernachtungsmöglichkeit-anbieten'><span>Wie kann ich eine Übernachtungsmöglichkeit anbieten?</span></a></p><p><a href='#wie-lange-dauert-es-bis-mein-übernachtungsangebot-sichtbar-ist'><span>Wie lange dauert es bis mein Übernachtungsangebot sichtbar ist?</span></a></p><p><a href='#was-kann-ich-tun-wenn-ich-bei-meinem-übernachtungsangebot-niemanden-antreffe'><span>Was kann ich tun, wenn ich bei meinem Übernachtungsangebot niemanden antreffe?</span></a></p><p><a href='#was-kann-ich-tun-wenn-es-probleme-mit-einem-übernachtungsangebot-gabgibt'><span>Was kann ich tun, wenn es Probleme mit einem Übernachtungsangebot gab/gibt?</span></a></p><p><a href='#wie-finanziert-sich-openbnbib'><span>Wie finanziert sich OpenBnBib?</span></a></p><p><a href='#wie-kann-ich-openbnbib-unterstützen'><span>Wie kann ich OpenBnBib unterstützen?</span></a></p><p><a href='#welche-daten-werden-von-mir-gespeichert'><span>Welche Daten werden von mir gespeichert?</span></a></p><h2><a name="was-ist-openbnbib" class="md-header-anchor"></a><span>Was ist OpenBnBib?</span></h2><p><span>OpenBnBib ist eine Übernachtungsplattform von und für Personen, die in Bibliotheken, Archiven und anderen Informationseinrichtungen arbeiten. Dieser Service ist kostenlos und wird von den in </span><a href='about.html'><span>Über uns</span></a><span> genannten Personen gepflegt.</span></p><p><span>Alle Teile von OpenBnBib sind kostenlos. Siehe auch </span><a href='#wie-finanziert-sich-openbnbib'><span>Wie finanziert sich OpenBnBib?</span></a><span>. Solltest du auf ein Angebot stoßen, das eine Bezahlung verlangt, </span><a href='kontakt.html'><span>informiere uns bitte</span></a><span>.</span></p><h2><a name="wie-kann-ich-eine-übernachtungsmöglichkeit-wahrnehmen" class="md-header-anchor"></a><span>Wie kann ich eine Übernachtungsmöglichkeit wahrnehmen?</span></h2><p><em><span>Wenn die Suche ohne Anmeldung funktioniert, ...</span></em></p><p><span>Zunächst kannst du über die </span><a href='suche.html'><span>Suche</span></a><span> schauen, ob es ein für dich passendes Übernachtungsangebot gibt. Ist dies der Fall, musst du dich zunächst </span><a href='anmeldung.html'><span>anmelden</span></a><span>. Dann kannst du dem Menschen hinter dem Übernachtungsangebot schreiben.</span></p><p><em><span>Wenn die Suche nur mit Anmeldung funktioniert, ...</span></em></p><p><span>Um eine Übernachtungsmöglichkeit wahrnehmen zu können, musst du dich zunächst </span><a href='anmeldung.html'><span>anmelden</span></a><span>. Anschließend kannst du über die </span><a href='suche.html'><span>Suche</span></a><span> schauen, ob es ein für dich passendes Übernachtungsangebot gibt. Ist dies der Fall, kannst du dem Menschen hinter dem Übernachtungsangebot schreiben.</span></p><h2><a name="wie-kann-ich-eine-übernachtungsmöglichkeit-anbieten" class="md-header-anchor"></a><span>Wie kann ich eine Übernachtungsmöglichkeit anbieten?</span></h2><p><span>Um eine Übernachtungsmöglichkeit anbieten zu können, musst du dich zunächst </span><a href='anmeldung.html'><span>anmelden</span></a><span>. Danach kannst du in deinem Profil Angaben zu deiner Übernachtungsmöglichkeit und zu dir machen.</span></p><h2><a name="wie-lange-dauert-es-bis-mein-übernachtungsangebot-sichtbar-ist" class="md-header-anchor"></a><span>Wie lange dauert es bis mein Übernachtungsangebot sichtbar ist?</span></h2><p><span>[Hier müssten wir noch klären, ob wir die Daten zunächst prüfen und dann erst freigeben.]</span></p><h2><a name="was-kann-ich-tun-wenn-ich-bei-meinem-übernachtungsangebot-niemanden-antreffe" class="md-header-anchor"></a><span>Was kann ich tun, wenn ich bei meinem Übernachtungsangebot niemanden antreffe?</span></h2><p><span>Stelle nach Möglichkeit vor deiner Fahrt persönlichen Kontakt mit der Person hinter dem Übernachtungsangebot her (z.B. per Video oder Telefon). Solltest du trotzdem niemanden antreffen, dann </span><a href='kontakt.html'><span>informiere uns bitte</span></a><span>. Wir nehmen dann mit dem/der Gastgeber:in Kontakt auf, und behalten uns vor das Angebot zu löschen.</span></p><h2><a name="was-kann-ich-tun-wenn-es-probleme-mit-einem-übernachtungsangebot-gabgibt" class="md-header-anchor"></a><span>Was kann ich tun, wenn es Probleme mit einem Übernachtungsangebot gab/gibt?</span></h2><p><span>Solltest du die Probleme - wovon wir ausgehen - nicht bilateral klären, dann </span><a href='kontakt.html'><span>informiere uns bitte</span></a><span>. Wir nehmen dann mit dem/der Gastgeber:in Kontakt auf, und behalten uns vor das Angebot zu löschen. </span></p><h2><a name="wie-finanziert-sich-openbnbib" class="md-header-anchor"></a><span>Wie finanziert sich OpenBnBib?</span></h2><p><span>Das Projekt wurde ehrenamtlich initiiert, die Plattform im Rahmen einer Masterarbeit von Katharina Klausner basierend auf den Vorüberlegungen erstellt. Die laufenden Betriebskosten trägt der </span><a href='https://www.vdb-online.org/'><span>Verein Deutscher Bibliothekarinnen und Bibliothekare (VDB)</span></a><span>, die kontinuierliche Pflege erfolgt ehrenamtlich.</span></p><h2><a name="wie-kann-ich-openbnbib-unterstützen" class="md-header-anchor"></a><span>Wie kann ich OpenBnBib unterstützen?</span></h2><p><span>Du kannst und bei der ehrenamtlichen Pflege, Betreuung und Weiterentwicklung unterstützen und zudem (oder alternativ) Mitglied werden beim </span><a href='https://www.vdb-online.org/'><span>Verein Deutscher Bibliothekarinnen und Bibliothekare (VDB)</span></a><span>.</span></p><h2><a name="welche-daten-werden-von-mir-gespeichert" class="md-header-anchor"></a><span>Welche Daten werden von mir gespeichert?</span></h2><p><span>Von dir werden nur die Daten (...) gespeichert, die du bei der Anmeldung angegeben hast sowie. Näheres findest du in unserer </span><a href='datenschutz.html'><span>Datenschutzerklärung</span></a><span>.</span></p></div>

        </div>

    </div>
@endsection

