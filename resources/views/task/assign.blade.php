@extends('components.master')

@section('body')



<form method="post" action="{{route('assignTask', $selectUserData->id)}}">
    @csrf
    <div class="mb-3">
    <select name="assigned_to[]" class="form-control" multiple>

        @foreach ($sl as $ss)
        
            @foreach($userData as $user)

        <option value="{{$user->id}}" 
                
                @selected ($ss->user_id == $user->id)
                >
                {{$user->name}}
                </option>

            @endforeach
            
        

        @endforeach
  
    </select>  

    </div>

    <div class="mb-3">
        <button class="btn btn-primary">Assign Task</button>
    </div>



</form>


@endsection