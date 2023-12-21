<?php

namespace App\Http\Controllers;
use App\Models\Task;
use App\Models\User;
use App\Models\Category;
use Collective\Html\HtmlFacade;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;

class TasksController extends Controller
{
    protected $table = 'tasks';
    
    
    public function index()
    {
        $user = auth()->user(); 
        $tasks= Task::all();
        $userTasks = $user->tasks()->get();
        $categories = Category::all();
        return view('Tasks.index', compact('user', 'tasks', 'userTasks','categories'));
    }


    public function create()
    {
        $categories = Category::all();
        return view('Tasks.create', compact('categories'));

    }

    public function store(Request $request)
    {
        $rules = array(
            'name'       => 'required',
            'description'      => 'required',
            'date' => 'required'
        );
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return redirect()->route('Tasks.create')
                ->withErrors($validator);
        } else {
            $categoryId = $request->input('category_id'); // Assuming this is how you receive the category ID
            $userId= auth()->user()->id; 
            $task = Task::where('name', $request->input('name'))->first();

    if (!$task) {
        $task = Task::create([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'date' => $request->input('date'),
        ]);
    }

    $task->category()->associate($categoryId);
    $task->user()->associate($userId);
    $task->save();
            if ($task->wasRecentlyCreated) {
                Session::flash('message', 'Task created successfully');
            } else {
                Session::flash('message', 'Task already exists');
            }
            
            return redirect()->route('Tasks.create');
            
        }
    }

    public function show($id)
    {
        $user = auth()->user(); 
        $tasks= Task::all();
        $userTasks = $user->tasks()->get();
        $categories = Category::all();
        $user = auth()->user();
        $tasks= Task::all();

        $Task = Task::find($id);
        $userTasks = $user->tasks()->get();
        $users = User::all();
            return view('Tasks.show', compact('users', 'tasks','Task','userTasks'));
       
    }

    public function edit($id)
    {
        $categories = Category::all();
        $Task = Task::find($id);
        return View('Tasks.edit',compact('Task','categories'));
    }

    public function update(Request $request, string $id)
    {
        $rules = [
            'name' => 'required',
            'description' => 'required',
            'date' => 'required'
        ];
        
        $validator = Validator::make($request->all(), $rules);
        
        if ($validator->fails()) {
            return redirect()->route('Tasks.create')
                ->withErrors($validator);
        } else {
           $task = Task::find($id);
            if ($task) {
                $task->update([
                    'category_id' => $request->input('category_id'),
                      'name' => $request->input('name'),
                    'description' => $request->input('description'),
                    'date' => $request->input('date')
                ]);
        
                Session::flash('message', 'Task updated successfully');
            } 
            else {
                Session::flash('message', 'Task does not exist');
            }
        
            return redirect()->route('Tasks.index');
        }
              
 }
    public function destroy($id)
    {
        $Task = Task::find($id);
        $Task->delete();
        Session::flash('message', 'Task deleted successfully');
        return redirect()->route('Tasks.index');
             
    }
}
