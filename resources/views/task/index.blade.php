@extends('components.master')



@section('body')

    

    <div class="mb-3">
        <a href="{{route('createTask')}}">
        <button class="btn btn-primary">Add Task</button>
        </a>
    </div>
    <h1>Tasks List</h1>

    <table class="table table-striped">
        <thead>
            <tr>
               <th>ID</th>
                <th>Title</th>
                <th>Description</th>
                <th>Created By</th>
                <th>Assigned To</th>
                <th>Due Date</th>
                <th>Priority</th>
                <th>Status</th>
                <th>Category</th>
                <th>Action<th>
            </tr>
        </thead>

        <tbody>
            @foreach($taskData as $task)
                @foreach($selectData as $asData)
            <tr>
                <td>{{$task->id}}</td>
                <td>{{$task->title}}</td>
                <td>{{$task->description}}</td>
                <td>{{$task->name}}</td>
                <td>{{$asData['username']}}</td>
                <td>{{$task->due_date}}</td>
                <td>{{$task->priority}}</td>
                <td>{{$task->status}}</td>
                <td>{{$task->category}}</td>
                
                <td style="width:21%">
                    <a href="{{route('editTask', $task->id)}}">

                    <button class="btn btn-success btn-sm">Edit</button>
                    </a>

                    <a href="{{route('deleteTask', $task->id)}}">

                    <button class="btn btn-danger btn-sm">Delete</button>
                    </a>

                    <a href="{{route('showAssign', $task->id)}}">

                    <button class="btn btn-secondary btn-sm">Assign</button>
                    </a>

                    <a href="{{route('viewTask', $task->id)}}">

                    <button class="btn btn-info btn-sm">View</button>
                    </a>
                    
                </td>


            </tr>

                @endforeach

            @endforeach
            
        </tbody>
    </table>
@endsection
