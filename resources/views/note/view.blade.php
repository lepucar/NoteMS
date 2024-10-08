@extends('components.master')

@section('body')

<div class="mb-3">

<h1>{{$noteData->title}}</h1>
<h3>{{$noteData->description}}</h3>
<p>{{$noteData->name}}</p>

<p>{{$noteData->category}}</p>


<h5>Display Comments</h5>
  
                    @include('note.commentsDisplay', ['comments' => $noteData->comments, 'note_id' => $noteData->id])
   
                    <hr/>
                    <p>Add comment</p>
                    <form method="post" action="{{ route('storeNoteComment', $noteData->id)}}">
                        @csrf
                        
                            <textarea class="form-control" name="body"></textarea>
                            <input type="hidden" name="task_id" value="{{ $noteData->id }}" />
                        
                        
                            <button class="btn btn-primary">Add Comment</button>
                        
                    </form>


</div>
@endsection