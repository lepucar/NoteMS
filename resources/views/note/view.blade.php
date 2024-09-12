@extends('components.master')

@section('body')

<div class="mb-3">

<h1>{{$noteData->title}}</h1>
<h3>{{$noteData->description}}</h3>
<p>{{$noteData->name}}</p>

<p>{{$noteData->category}}</p>


</div>
@endsection