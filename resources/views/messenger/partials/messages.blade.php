<div class="media">
    <a class="pull-left" href="#">
        <img src="{{$message->user->profile->profileImage()}}" class="image-cropper rounded-circle mw-10 float-left mb-sm-4 mr-sm-4" style="max-height: 50px; max-width:50px;" alt="Profilbild">

    </a>
    <div class="media-body">
        <h5 class="media-heading"><a href="/profile/{{ $message->user->username }}">{{ $message->user->firstname }}</a></h5>
        <p>{{ $message->body }}</p>
        <div class="text-muted">
{{--            war: $message->created_at->diffForHumans()--}}
            <small>Geschrieben {{ $message->created_at->diffForHumans() }}</small>
        </div>
    </div>
</div>
