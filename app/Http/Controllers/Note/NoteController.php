<?php

namespace App\Http\Controllers\Note;

use App\Http\Controllers\Controller;
use App\Http\Requests\NoteRequest;
use App\Http\Requests\NoteUpdateRequest;
use App\Http\Requests\ShareRequest;
use App\Models\Notes;
use App\Models\Shares;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class NoteController extends Controller
{
    public function index()
    {
        $noteData = DB::table('users')
            ->join('notes', 'users.id', '=', 'notes.user_id')

            ->select('users.*', 'notes.*')
            ->get();
        return view('note.index', compact('noteData'));
    }

    public function create()
    {
        return view('note.create');
    }

    public function store(NoteRequest $request)
    {

        $validated = $request->validated();
        $validated['user_id'] = Auth::user()->id;

        
        

        $note = Notes::create($validated);

        if ($note) {
            return redirect()->route('showNotes');
        } else {
            return redirect()->back();
        }
    }

    public function edit($id)
    {
        $noteData = Notes::where('id', $id)->first();
        return view('note.edit', compact('noteData'));
    }

    public function update(NoteUpdateRequest $request, $id)
    {
        $validated = $request->validated();

        unset($validated['_token']);

        $note = Notes::where('id', $id)->update($validated);

        if ($note) {
            return redirect()->route('showNotes');
        } else {
            return redirect()->back();
        }
    }

    



    
    public function delete($id)
    {
        
        $delete = Notes::where('id', $id)->delete();

        if ($delete) {
            return redirect()->route('showNotes');
        } else {
            return redirect()->back();
        }
    }

    public function view($id)
    {
        $noteData = Notes::where('id', $id)->with('comments')->findOrFail($id);
        

        return view('note.view', compact('noteData'));
    }

    public function showShare($id)
    {
        $userData = User::all();
        $noteData = Notes::where('id', $id)->first();
        return view('note.share', compact('userData', 'noteData'));
    }

    public function share(ShareRequest $request, $id)
    {
        $validations = $request->validated();
        $validations['fromUID'] = Auth::user()->id;
        
        $validations['note_id'] = $id;
        
        $data = $request->input('toUID');
        
        
        $i=0;
        foreach ($data as $d) {
            

                $assignData[$i] = ['user_id' => $d];
                $i++;
                
            
            
        }

        

        $validations['toUID'] = json_encode($assignData);
        $share = Shares::create($validations);

        if($share)
        {
            return redirect()->route('showNotes');
        }
        else
        {
            return redirect()->back();
        }



    }


}
