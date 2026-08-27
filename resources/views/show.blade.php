@extends('layouts.app')

@section('title', $task->title)

@section('content')

<div class="mb-6">
    <a href="{{ route('tasks.index')}}" class="link">&larr; Back to all tasks</a>
</div>

<article class="panel">
<p class="mb-6 text-lg leading-8 text-[#455258]">{{ $task-> description }}</p>

@if ($task ->long_description)
    <p class="mb-6 whitespace-pre-line border-t border-[#dce1dc] pt-6 leading-7 text-[#455258]">{{ $task ->long_description }}</p>
@endif

<p class="mb-6 font-mono text-xs uppercase tracking-wider text-[#66737a]">Created {{ $task-> created_at->diffForHumans()}} &middot; Updated {{ $task-> updated_at->diffForHumans()}}</p>

<p>
    @if ($task->completed)
    <span class="font-bold text-[#28613c]">● Completed</span> 
    @else 
    <span class="font-bold text-[#b84d3a]">○ Not completed</span>    
    @endif
</p>

<div class="mt-8 flex flex-wrap gap-3 border-t border-[#dce1dc] pt-6">
 <a href="{{ route('tasks.edit', ['task'=> $task]) }}"class="btn">Edit</a>

    <form method="POST" action="{{ route('tasks.toggle-complete',['task'=> $task])}}">
        @csrf
        @method('PUT')
        <button type="submit" class="btn">
            Mark as {{ $task->completed ? 'not completed':'completed' }}
        </button>
    </form>

    <form action="{{ route('tasks.destroy', ['task' => $task->id]) }}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn">Delete</button>
    </form>
</div>
</article>

@endsection
