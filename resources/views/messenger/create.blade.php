@extends('layouts.app')

@section('content')
    <h1>Schreibe eine Nachricht an
        {{$user->firstname}}
    </h1>
    <form action="{{ route('messages.store') }}" method="post">
        {{ csrf_field() }}
            <!-- Subject Form Input -->
            <div class="form-group">
                <label class="control-label">Titel</label>
                <input type="text" class="form-control" name="subject" placeholder="Titel"
                       value="{{ old('subject') }}">
            </div>

            <!-- Message Form Input -->
            <div class="form-group">
                <label class="control-label">Inhalt</label>
                <textarea name="message" class="form-control">{{ old('message') }}</textarea>
            </div>

            @if($user->count() > 0)
                <div class="checkbox">
{{--                    @foreach($users as $user)--}}
                        <label title="{{ $user->firstname }}"><input type="checkbox" name="recipients[]"
                        value="{{ $user->id }}" hidden checked></label>
{{--                    @endforeach--}}
                </div>
        @endif

            <!-- Submit Form Input -->
            <div class="form-group">
                <button type="submit" class="btn btn-primary form-control">Abschicken</button>
            </div>
    </form>

@endsection
{{--@stop--}}
