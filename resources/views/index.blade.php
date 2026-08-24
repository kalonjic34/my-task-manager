@extends('layouts.app')

@section('title', 'Your Personal Task Overview')

@section('content')

<div>
    <a href="{{ route('tasks.create')}}">Add Task!</a>
</div>
    
    @forelse ($tasks as $task)
        <div>
            <a href="{{ route('tasks.show',['task'=>$task-> id]) }}">{{ $task->title }}</a>
        </div>  
    @empty
        <div>You have no tasks yet.<div>
    @endforelse 

    @if ($task ->count())
        <nav>
                {{ $tasks->links() }} 
        </nav>
    @endif

@endsection
