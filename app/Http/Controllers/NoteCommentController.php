<?php

namespace App\Http\Controllers;

use App\Mail\NoteCommentMail;
use App\Models\NoteComments;
use App\Models\Notes;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class NoteCommentController extends Controller
{
    public function store(Request $request, $id)
    {
        $validations = $request->validate([
            'body' => 'string'
            
        ]);
        $validations['user_id'] = Auth::user()->id;
        $validations['notes_id'] = $id;


        $userData = User::where('id', $validations['user_id'])->first();
        
        $data['username'] = $userData->name;

        $data['body'] = $validations['body'];

        $nc = NoteComments::create($validations);

        $note = Notes::where('id', $id)->with('user')->first();

        Mail::to($note->name)->send(new NoteCommentMail($data));

    
        return redirect()->back();
        
        
    }
}
