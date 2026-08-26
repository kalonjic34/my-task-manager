@extends('layouts.app')

@section('title', 'Your Personal Task Overview')

@section('content')

<nav class="mb-4">
    <a href="{{ route('tasks.create')}}" class="font-medium text-grey-700 underline decoration-pink-500">Add Task!</a>
</nav>
    
    @forelse ($tasks as $task)
        <div>
            <a href="{{ route('tasks.show',['task'=>$task-> id]) }}"
                
                @class(['line-through'=> $task->completed])>{{ $task->title }}</a>
        clas
        </div>  
    @empty
        <div>You have no tasks yet.<div>
    @endforelse 

    @if ($task ->count())
        <nav class="mt-4">
                {{ $tasks->links() }} 
        </nav>
    @endif

@endsection
