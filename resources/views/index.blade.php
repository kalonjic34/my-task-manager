@extends('layouts.app')

@section('title', 'Your Personal Task Overview')

@section('content')

<div class="mb-7 flex items-center justify-between gap-4">
    <p class="max-w-sm text-sm leading-6 text-[#66737a]">Keep the list clear. Give your attention to the next useful thing.</p>
    <a href="{{ route('tasks.create')}}" class="btn shrink-0">+ Add task</a>
</div>

<div class="panel">
    @forelse ($tasks as $task)
        <div class="task-row">
            <a href="{{ route('tasks.show',['task'=>$task-> id]) }}"
                class="min-w-0 truncate text-lg font-bold transition hover:text-[#e7654e]"
                @class(['line-through text-[#8b9698]'=> $task->completed])>{{ $task->title }}</a>
            @if ($task->completed)
                <span class="shrink-0 rounded-full bg-[#e6f3e9] px-3 py-1 font-mono text-[10px] uppercase tracking-wider text-[#28613c]">Done</span>
            @else
                <span class="shrink-0 rounded-full bg-[#fff0eb] px-3 py-1 font-mono text-[10px] uppercase tracking-wider text-[#b84d3a]">Open</span>
            @endif
        </div>
    @empty
        <div class="py-8 text-center">
            <p class="mb-2 text-lg font-bold">A clean slate.</p>
            <p class="text-sm text-[#66737a]">You have no tasks yet.</p>
        </div>
    @endforelse 
</div>

    @if ($tasks->count())
        <nav class="mt-6">
                {{ $tasks->links() }} 
        </nav>
    @endif

@endsection
