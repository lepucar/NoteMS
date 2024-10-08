@extends('components.master')



@section('body')

    

@if(isset($results['note']) && count($results['note']) > 0)
   

    <h1>Notes List</h1>

    <table class="table table-striped">
        <thead>
            <tr>
              
                <th>Title</th>
                <th>Description</th>
                
            </tr>
        </thead>

        <tbody>
        @foreach($results['note'] as $note)
            <tr>
                
                <td><a href="{{route('viewNote', $note->id)}}">{{$note->title}}</td>
                <td>{{$note->description}}</a></td>
            </tr>
        @endforeach

            
        </tbody>
    </table>

@elseif(isset($results['task']) && count($results['task']) > 0)


<h1>Tasks List</h1>

    <table class="table table-striped">
        <thead>
            <tr>
              
                <th>Title</th>
                <th>Description</th>
                
                
        </thead>

        <tbody>
        @foreach($results['task'] as $task)
                
            <tr>
               
                <td> <a href="{{route('viewTask', $task->id)}}">{{$task->title}}</td>
                <td>{{$task->description}}</td>
            </tr>

                
        @endforeach
            
        </tbody>
    </table>

@else
        <h1>No results found</h1>

@endif





@endsection
