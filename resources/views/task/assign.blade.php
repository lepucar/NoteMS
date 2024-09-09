@extends('components.master')

@section('body')

<form method="post" action="{{route('assignTask', $selectUserData->id)}}">
    @csrf
    <div class="mb-3">
    <select name="cars" id="cars" multiple>
        @foreach ($userData as $user)
            <h1>{{$user->name}}</h1>
            

       
            
        @endforeach
  
    </select>  

    </div>

    <div class="mb-3">
        <button class="btn btn-primary">Assign Task</button>
    </div>



</form>


@endsection