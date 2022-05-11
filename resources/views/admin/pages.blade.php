@extends('layouts.app')

{{--@section('title')
    Dashboard | Admin Panel
@endsection--}}

@section('content')
    <div class="row page-title-header">
        <div class="col-12">
            <div class="page-header">
                <h4 class="page-title">Dashboard</h4>
            </div>
        </div>
        <div class="col-md-12">
            <ul>
                <li><a href="/admin/show">Zeige alle Nutzer, die über ein Jahr nicht aktiv waren</a>
                </li>
            </ul>
        </div>
    </div>

@endsection
