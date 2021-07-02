@extends('layouts.app')

@section('content')
    <h1>Nachrichten</h1>

    @include('messenger.partials.flash')

{{--    @each('messenger.partials.thread', $threads, 'thread', 'messenger.partials.no-threads')--}}
    @each('messenger.partials.thread', $threads, 'thread', 'messenger.partials.no-threads')
@stop
