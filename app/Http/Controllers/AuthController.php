<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class AuthController extends Controller
{
    public function index()
    {

        return Inertia::render('Auth/Login');
    }
    public function signIn(Request $request)
    {

        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            $user  = User::where('email', $request->email)->first();
            $role  = Role::find($user->id);
            return redirect()->intended("$role->redirect");
        } else {
            // Las credenciales son inválidas
            return redirect()->back()->withErrors(['message' => 'Credenciales inválidas']);
        }
    }
    public function signOut()
    {
        Auth::logout();
        return redirect('/login');
    }
}
