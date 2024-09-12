@extends('components.master')

@section('body')

<div class="mb-3">

<h1>{{$taskData->title}}</h1>
<h3>{{$taskData->description}}</h3>
<p>{{$taskData->name}}</p>
<p>{{$taskData->due_date}}</p>
<p>{{$taskData->category}}</p>
<p>{{$taskData->status}}</p>
<p>{{$taskData->priority}}</p>

</div>
@endsection