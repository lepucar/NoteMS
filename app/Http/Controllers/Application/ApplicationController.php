<?php

namespace App\Http\Controllers\Application;

use App\Http\Controllers\Controller;
use App\Models\Notes;
use App\Models\Task;
use Illuminate\Http\Request;

class ApplicationController extends Controller
{
    public function index()
    {
        return view('application.dashboard');
    }

    public function search(Request $request)
    {
        $keyword = $request->input('keyword');
        $searchResults = [
            'note' => Notes::where('title', 'like', "%$keyword%")->get(),
            'task' => Task::where('title', 'like', "%$keyword%")->get(),
            
        ];
        return view('search-results', ['results' => $searchResults]);
    }

    public function filter(Request $request)
    {
        $taskfilterCrit = $request->input('taskcriteria');
        $notefilterCrit = $request->input('notecriteria');
        $taskData = Task::where('category', $taskfilterCrit)->get();
        $noteData = Notes::where('category', $notefilterCrit)->get();


        return view('filtered', compact('taskData', 'noteData'));
        

    }
}
