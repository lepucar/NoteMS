@foreach($comments as $comment)
    
        <strong>{{ $comment->user->name }}</strong>
        <p>{{ $comment->body }}</p>
        <a href="" id="reply"></a>
        <form method="post" action="{{ route('storeComment', $taskData->id) }}">
            @csrf
            
                <input type="text" name="body" class="form-control" />
                <input type="hidden" name="task_id" value="{{ $task_id }}" />
                <input type="hidden" name="parent_id" value="{{ $comment->id }}" />
            
            
                <button class="btn btn-primary">Reply</button>
            
        </form>
        @include('task.commentsDisplay', ['comments' => $comment->replies])
    
@endforeach
