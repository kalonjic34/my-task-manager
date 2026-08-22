<h1>
    Your Personal Task Overview
</h1>

<div>

    @forelse ($tasks as $task)
        <div>
            <a href="{{ route('tasks.show',['id'=>$task-> id]) }}">{{ $task->title }}</a>
        </div>  
    @empty
        <div>You have no tasks yet.<div>
    @endforelse 

</div>