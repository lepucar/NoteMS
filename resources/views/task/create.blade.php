@extends('components.master')

@section('body')

<form method="post" action="{{route('storeTask')}}">
    @csrf
    <div class="mb-3">
        <label for="title" class="form-label">Title
            <span class="text-danger">{{$errors->first('title')}}</span>
        </label>
        <input type="text" class="form-control" id="exampleFormControlInput1" name="title" value="{{old('title)}}">

    </div>

    <div class="mb-3">
        <label for="description" class="form-label">Description
            <span class="text-danger">{{$errors->first('description')}}</span>
        </label>
        <textarea class="form-control" id="textareaDesc" name="description">{{old('description)}}</textarea>

    </div>






    <div class="mb-3">


        <label for="priority" class="form-label">Priority
            <span class="text-danger">{{$errors->first('priority')}}</span>
        </label>


        <div class="form-check">

            <input type="radio" name="priority" class="form-check-input" value="high" {{old('priority') == 'high' ? 'checked' : ''}}>
            <label for="high" class="form-check">High</label>
        </div>

        <div class="form-check">

            <input type="radio" name="priority" class="form-check-input" value="medium" {{old('priorirty') == 'medium' ? 'checked' : ''}}>
            <label for="medium" class="form-check">Medium</label>
        </div>

        <div class="form-check">

            <input type="radio" name="priority" class="form-check-input" value="low" {{old('priorirty') == 'low' ? 'checked' : ''}}>
            <label for="low" class="form-check">Low</label>
        </div>




    </div>


    <div class="mb-3">


        <label for="status" class="form-label">Status
            <span class="text-danger">{{$errors->first('status')}}</span>
        </label>


        <div class="form-check">

            <input type="radio" name="status" class="form-check-input" value="not_started" {{old('status') == 'not_started' ? 'checked' : ''}}>
            <label for="not_started" class="form-check">Not Started</label>
        </div>

        <div class="form-check">

            <input type="radio" name="status" class="form-check-input" value="in_progress" {{old('status') == 'in_progress' ? 'checked' : ''}}>
            <label for="in_progress" class="form-check">In Progress</label>
        </div>

        <div class="form-check">

            <input type="radio" name="status" class="form-check-input" value="completed" {{old('status') == 'completed' ? 'checked' : ''}}>
            <label for="completed" class="form-check">Completed</label>
        </div>




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
        <label for="due_date" class="form-label">Due Date
            <span class="text-danger">{{$errors->first('due_date')}}</span>
        </label>
        <input type="date" class="form-control" id="exampleFormControlInput1" name="due_date" value="{{old('due_date')}}">

    </div>


    <div class="mb-3">
        <button class="btn btn-primary">Add Task</button>
    </div>



</form>


@endsection