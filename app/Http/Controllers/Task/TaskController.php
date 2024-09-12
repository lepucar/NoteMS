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

        $selectData = $this->buildArray();
        return view('task.index', compact('taskData', 'selectData'));
        
       
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

        if ($task) {
            return redirect()->route('showTasks');
        } else {
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

        if ($task) {
            return redirect()->route('showTasks');
        } else {
            return redirect()->back();
        }
    }

    public function showassign($id)
    {
        $userData = User::all();

        $selectUserData = Task::where('id', $id)->select('id', 'assigned_to')->first();
        $sl = json_decode($selectUserData['assigned_to']);
        
        



        return view('task.assign', compact(['userData' => 'userData', 'selectUserData' => 'selectUserData', 'sl' => 'sl']));
    }



    public function assignTask(Request $request, $id)
    {

        $data = $request->input('assigned_to');
        
        foreach ($data as $key => $value) {
            
            
                $assignData[] = ['user_id' => $value];
                
            
            
        }
        // $assignData = json_encode($data);
        
        $assign = Task::where('id', $id)->update(['assigned_to' => $assignData]);

        if ($assign) {
            return redirect()->route('showTasks');
        } else {
            return redirect()->back();
        }
    }

    public function delete($id)
    {
        $delete = Task::where('id', $id)->delete();

        if ($delete) {
            return redirect()->route('showTask');
        } else {
            return redirect()->back();
        }
    }

    public function view($id)
    {
        $taskData = DB::table('users')
            ->join('tasks', 'users.id', '=', 'tasks.user_id')

            ->select('users.*', 'tasks.*')
            ->where('users.id', $id)
            ->first();
        return view('task.view', compact('taskData'));
    }

    public function buildArray()
    {
        $selectData[] = null;
        $data = Task::all();
        
        
        foreach ($data as $d)
        {
            
            $p = $d->assigned_to;
            $jsondata = json_decode($p);
            
            
            
            if($jsondata != null)
            {
                $i = 0;
                foreach ($jsondata as $d)
                {
                    
                    
                    $user = User::where('id', $d->user_id)->first();
                    
                    $username = $user->name;



                    $selectData[$i] = ['username' => $username];
                    $i++;
                    
                    
                }
            }
            else
            {
                $i=0;
                $selectData[$i] = ['username' => 'None'];
                $i++;
            }  
        }   
       
         return $selectData;
}
}
