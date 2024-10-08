<?php

namespace App\Http\Controllers\TaskComment;

use App\Http\Controllers\Controller;
use App\Mail\CommentMail;
use App\Models\Task;
use App\Models\TaskComment;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;


class TaskCommentController extends Controller
{
    public function store(Request $request, $id)
    {
        $validations = $request->validate([
            'body' => 'string'
            
        ]);
        $validations['user_id'] = Auth::user()->id;
        $validations['task_id'] = $id;

        $userData = User::where('id', $validations['user_id'])->first();
        
        $data['username'] = $userData->name;

        $data['body'] = $validations['body'];

        $tc = TaskComment::create($validations);

        $task = Task::where('id', $id)->with('user')->first();
        

        Mail::to($task->name)->send(new CommentMail($data) );
        
        
        return redirect()->back();
        
        
    }
}
