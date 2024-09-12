@extends('components.master')



@section('body')

    

    <div class="mb-3">
        <a href="{{route('createNote')}}">
        <button class="btn btn-primary">Add Note</button>
        </a>
    </div>
    <h1>Notes List</h1>

    <table class="table table-striped">
        <thead>
            <tr>
               <th>ID</th>
                <th>Title</th>
                <th>Description</th>
                <th>Created By</th>
                
                <th>Category</th>
                <th>Action<th>
            </tr>
        </thead>

        <tbody>
            @foreach($noteData as $note)
                
            <tr>
                <td>{{$note->id}}</td>
                <td>{{$note->title}}</td>
                <td>{{$note->description}}</td>
                <td>{{$note->name}}</td>
                
                <td>{{$note->category}}</td>
                
                <td style="width:21%">
                    <a href="{{route('editNote', $note->id)}}">

                    <button class="btn btn-success btn-sm">Edit</button>
                    </a>

                    <a href="{{route('deleteNote', $note->id)}}">

                    <button class="btn btn-danger btn-sm">Delete</button>
                    </a>

                    <a href="{{route('showShare', $note->id)}}">

                    <button class="btn btn-secondary btn-sm">Share</button>
                    </a>

                    <a href="{{route('viewNote', $note->id)}}">

                    <button class="btn btn-info btn-sm">View</button>
                    </a>
                    
                </td>


            </tr>

                @endforeach

            
            
        </tbody>
    </table>
@endsection
