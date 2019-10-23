<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;

use Auth;

class UsersController extends Controller
{
    public function index()
    {
        $users = User::orderBy('id', 'desc')->paginate(10);

        return view('users.index', [
            'users' => $users,
        ]);
    }
    public function show($id)
    {
        if (Auth::id() == $id) {
            $user = User::find($id);
            $tasks = $user->tasks()->orderBy('created_at', 'desc')->paginate(10);
    
            $data = [
                'user' => $user,
                'tasks' => $tasks,
            ];
    
            $data += $this->counts($user);
    
            return view('users.show', $data); 
        } else {
            return redirect('/');
        }
        
        /*
        $user = User::find($id);
        
        return view('users.show', [
            'user' => $user,
        ]);
        */
    }
}
