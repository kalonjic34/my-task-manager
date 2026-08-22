<?php

use Illuminate\Http\Response;
use Illuminate\Support\Facades\Route;
 
class Task 
{ 
  public function __construct( 
    public int $id, 
    public string $title, 
    public string $description, 
    public ?string $long_description, 
    public bool $completed, 
    public string $created_at, 
    public string $updated_at 
  ) { 
  } 
} 
 
$tasks = [ 
  new Task( 
    1, 
    'Pay electricity bill', 
    'Pay the electricity bill before the due date', 
    'Check the account balance and make the payment before the end of the month.', 
    false,
    '2026-08-22 09:00:00', 
    '2026-08-22 09:00:00' 
  ), 
  new Task( 
    2, 
    'Book a haircut', 
    'Find a time to get a haircut this week', 
    null, 
    false,
    '2026-08-22 10:30:00', 
    '2026-08-22 10:30:00' 
  ), 
  new Task( 
    3, 
    'Buy new running shoes', 
    'Look for a comfortable pair of running shoes', 
    'Compare a few options, check the reviews, and find something comfortable that fits the budget.', 
    true, 
    '2026-08-22 11:00:00', 
    '2026-08-22 11:00:00' 
  ), 
  new Task( 
    4, 
    'Clean the apartment', 
    'Do a proper clean and tidy up', 
    null, 
    false, 
    '2026-08-22 12:00:00', 
    '2026-08-22 12:00:00' 
  ), 
];


Route::get('/',function(){
    return redirect()->route('tasks.index');
});

Route::get('/tasks', function () use ($tasks) {
    return view('index', [
        'tasks'=> $tasks,
    ]);
})->name('tasks.index');

Route::get('/tasks/{id}',function($id) use($tasks){
    
    $task = collect($tasks)->firstWhere('id',$id);

    if (!$task) {
        abort(Response::HTTP_NOT_FOUND);
    }

    return view('show',[
        'task'=>$task,
    ]);
})->name('tasks.show');


Route::fallback(function(){
    return 'Sorry not available';
});