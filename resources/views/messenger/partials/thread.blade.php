<?php use Illuminate\Support\Facades\Auth;

$class = $thread->isUnread(Auth::id()) ? 'alert-info' : ''; ?>

<div class="media alert {{ $class }}">
    <h4 class="media-heading">
        <p>
            {{--    ['firstname'] hinzugefügt / sucht sonst nach nicht vorhandenener Spalte "name"    --}}
            {{--    TODO Hier steht nochmal der Absender --}}
            Unterhaltung mit {{ $thread->participantsString(Auth::id(), ['firstname']) }}:

        <a href="{{ route('messages.show', $thread->id) }}">{{ $thread->subject }}</a>
        ({{ $thread->userUnreadMessagesCount(Auth::id()) }} ungelesen)
        </p>
{{--    <p>--}}
{{--        <small><strong>Von:</strong> {{ $thread->creator()->firstname }}</small>--}}
{{--    </p>--}}
{{--    <p>--}}
{{--        {{ $thread->latestMessage->body }}<br>--}}
{{--    </p>--}}
    </h4>
</div>
