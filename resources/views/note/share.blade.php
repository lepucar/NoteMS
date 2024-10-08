@extends('components.master')

@section('body')



<form method="post" action="{{route('shareNote', $noteData->id)}}">
    @csrf
    <div class="mb-3">
    <select name="toUID[]" class="form-control" multiple>
            @foreach($userData as $user)

            <option value="{{$user->id}}" >
                {{$user->name}}
            </option>
            @endforeach
  
    </select>  

    </div>

    <div class="mb-3">
        <button class="btn btn-primary">Share Note</button>
    </div>


</form>


@endsection