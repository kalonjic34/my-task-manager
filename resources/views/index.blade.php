@extends('layouts.app')

@section('title', 'Your Personal Task Overview')

@section('content')
    
    @forelse ($tasks as $task)
        <div>
            <a href="{{ route('tasks.show',['id'=>$task-> id]) }}">{{ $task->title }}</a>
        </div>  
    @empty
        <div>You have no tasks yet.<div>
    @endforelse 

@endsection
