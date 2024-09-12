@extends('components.master')

@section('body')

<form method="post" action="{{route('storeNote')}}">
    @csrf
    <div class="mb-3">
        <label for="title" class="form-label">Title
            <span class="text-danger">{{$errors->first('title')}}</span>
        </label>
        <input type="text" class="form-control" id="exampleFormControlInput1" name="title" value="{{old('title')}}">

    </div>

    <div class="mb-3">
        <label for="description" class="form-label">Description
            <span class="text-danger">{{$errors->first('description')}}</span>
        </label>
        <textarea class="form-control" id="textareaDesc" name="description">{{old('description')}}</textarea>

    </div>


    <div class="mb-3">

        <label for="category" class="form-label">Category
            <span class="text-danger">{{$errors->first('category')}}</span>
        </label>


        <div class="form-check">

            <input type="radio" name="category" class="form-check-input" value="work" {{old('category') == 'work' ? 'checked' : ''}}>
            <label for="work" class="form-check">Work</label>
        </div>

        <div class="form-check">

            <input type="radio" name="category" class="form-check-input" value="personal" {{old('category') == 'personal' ? 'checked' : ''}}>
            <label for="personal" class="form-check">Personal</label>
        </div>
    </div>

    <div class="mb-3">
        <button class="btn btn-primary">Add Task</button>
    </div>



</form>


@endsection