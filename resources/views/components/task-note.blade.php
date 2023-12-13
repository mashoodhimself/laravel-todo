@props(['note'])

<div class="row comment-box">
    <div class="col-md-12">
        <p> {{ $note->body }} </p>

        <span> Posted: {{ $note->created_at->diffForHumans() }} </span>

        <div><a href="{{ asset('storage/' . $note->attachment) }}">Attachment</a></div>
        
    </div>
</div>