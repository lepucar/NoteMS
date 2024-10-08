@foreach($comments as $comment)
    
        <strong>{{ $comment->user->name }}</strong>
        <p>{{ $comment->body }}</p>
        <a href="" id="reply"></a>
        <form method="post" action="{{ route('storeNoteComment', $noteData->id) }}">
            @csrf
            
                <input type="text" name="body" class="form-control" />
                <input type="hidden" name="note_id" value="{{ $note_id }}" />
                <input type="hidden" name="parent_id" value="{{ $comment->id }}" />
            
            
                <button class="btn btn-primary">Reply</button>
            
        </form>
        @include('note.commentsDisplay', ['comments' => $comment->replies])
    
@endforeach
