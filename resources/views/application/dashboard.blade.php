@extends('components.master')

@section('body')

<h1>Dashboard</h1>

<p> Completed Tasks: {{$taskData}} </p>
<p> Upcoming Deadlines </p>
@foreach($upcomingTasks as $task)

<p>{{$task->title}}</p>

@endforeach


@endsection