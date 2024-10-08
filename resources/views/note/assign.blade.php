@extends('components.master')

@section('body')



<form method="post" action="{{route('assignTask', $selectUserData->id)}}">
    @csrf
    <div class="mb-3">
    <select name="assigned_to[]" class="form-control" multiple>

        @foreach ($userData as $user)
            @if(empty($userId))
            <option value="{{$user->id}}">
            {{$user->name}}
            </option> 

            @else
            

            <option value="{{$user->id}}" 
                
                @selected (in_array($user->id, $userId))
                >
                {{$user->name}}
            </option>

            

            @endif

            
            
        

        @endforeach
  
    </select>  

    </div>

    <div class="mb-3">
        <button class="btn btn-primary">Assign Task</button>
    </div>



</form>


@endsection