@extends('welcome')
@section('content')

<div class="flex-center position-ref full-height">
    <div class="content">
        <div class="title m-b-md">
            Task Management
        </div>
        <div class="links">
            <a href="{{ route('tasks.add') }}">Add new task</a>
            <a href="{{ route('tasks.list') }}">Tasks list</a>
        </div>
    </div>
</div>

@endsection



