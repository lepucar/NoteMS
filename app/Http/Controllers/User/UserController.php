<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function register()
    {
        return view('user.create');
    }

    public function store(UserRequest $request)
    {
        
        $validated = $request->validated();

        $user = User::create($validated);
        
        if($user)
        {
            return redirect()->route('showLogin');
        }
        else{
            return redirect()->back();
        }
    }

    public function update(UserUpdateRequest $request, $id)
    {
        $validated = $request->validated();

        unset($validated['_tokens']);

        $user = User::where('id', $id)->update();

        if($user)
        {
            return redirect()->route('editUser');
        }
        else{
            return redirect()->back();
        }

    }

    public function delete($id)
    {
        $delete = User::where('id', $id)->delete();
        if($delete)
        {
            return redirect()->route('editUser');
        }
        else{
            return redirect()->back();
        }

    }
}
