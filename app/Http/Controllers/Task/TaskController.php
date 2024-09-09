<?php

namespace App\Http\Controllers\Task;

use App\Http\Controllers\Controller;
use App\Http\Requests\AssignTaskRequest;
use App\Http\Requests\TaskRequest;
use App\Http\Requests\TaskUpdateRequest;
use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class TaskController extends Controller
{
    public function index()
    {
        $taskData = DB::table('users')
        ->join('tasks', 'users.id', '=', 'tasks.user_id')
       
        ->select('users.*', 'tasks.*')
        ->get();
        return view('task.index', compact('taskData'));
    }

    public function create()
    {
        return view('task.create');
    }

    public function store(TaskRequest $request)
    {
        
        $validated = $request->validated();
        $validated['user_id'] = Auth::user()->id;

        $task = Task::create($validated);

        if($task)
        {
            return redirect()->route('showTasks');
        }
        else
        {
            return redirect()->back();
        }
    }

    public function edit($id)
    {
        $taskData = Task::where('id', $id)->first();
        return view('task.edit', compact('taskData'));
    }

    public function update(TaskUpdateRequest $request, $id)
    {
        $validated = $request->validated();

        unset($validated['_token']);

        $task = Task::where('id', $id)->update();

        if($task)
        {
            return redirect()->route('showTask');
        }
        else
        {
            return redirect()->back();
        }
    }

    public function showassign($id)
    {
        $userData = User::all();
        
        $selectUserData = Task::where('id', $id)->select('id', 'assigned_to')->first();
        $sl = json_decode($selectUserData['assigned_to']);
        
        
        return view('task.assign', compact('userData', 'selectUserData', 'sl'));
    }
}