@extends('components.master')

@section('body')

<div class="mb-3">

<h1>{{$taskData->title}}</h1>
<h3>{{$taskData->description}}</h3>
<p>{{$taskData->name}}</p>
<p>{{$taskData->due_date}}</p>
<p>{{$taskData->category}}</p>
<p>{{$taskData->status}}</p>
<p>{{$taskData->priority}}</p>




    <h5>Display Comments</h5>
  
                    @include('task.commentsDisplay', ['comments' => $taskData->comments, 'task_id' => $taskData->id])
   
                    <hr/>
                    <p>Add comment</p>
                    <form method="post" action="{{ route('storeComment', $taskData->id)}}">
                        @csrf
                        
                            <textarea class="form-control" name="body"></textarea>
                            <input type="hidden" name="task_id" value="{{ $taskData->id }}" />
                        
                        
                            <button class="btn btn-primary">Add Comment</button>
                        
                    </form>

</div>

@endsection