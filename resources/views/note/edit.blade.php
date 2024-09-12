@extends('components.master')

@section('body')

<form method="post" action="{{route('updateNote', $noteData->id)}}">
    @csrf
    <div class="mb-3">
        <label for="title" class="form-label">Title
            <span class="text-danger">{{$errors->first('title')}}</span>
        </label>
        <input type="text" class="form-control" id="exampleFormControlInput1" name="title" value="{{$noteData->title}}">

    </div>

    <div class="mb-3">
        <label for="description" class="form-label">Description
            <span class="text-danger">{{$errors->first('description')}}</span>
        </label>
        <textarea class="form-control" id="textareaDesc" name="description">{{$noteData->description}}</textarea>

    </div>


    <div class="mb-3">

        <label for="category" class="form-label">Category
            <span class="text-danger">{{$errors->first('category')}}</span>
        </label>


        <div class="form-check">

            <input type="radio" name="category" class="form-check-input" value="work" {{$noteData->category == 'work' ? 'checked' : ''}}>
            <label for="work" class="form-check">Work</label>
        </div>

        <div class="form-check">

            <input type="radio" name="category" class="form-check-input" value="personal" {{$noteData->category == 'personal' ? 'checked' : ''}}>
            <label for="personal" class="form-check">Personal</label>
        </div>
    </div>

    <div class="mb-3">
        <button class="btn btn-primary">Edit Note</button>
    </div>



</form>


@endsection