<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'between:5,255'],
            'email' => ['required', 'email', 'unique:users','regex:/^[a-zA-Z0-9._%+-]+@(etu\.unistra\.fr|unistra\.fr|[a-zA-Z0-9._%+-])$/'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        $role = null;
        if (str_ends_with($request->email, '@etu.unistra.fr')) {
            $role = 'student';
        } elseif ($request->has('is_teacher') && $request->has('is_manager')) {
            return back()->withErrors(['role' => 'Veuillez choisir un seul rôle (enseignant ou gestionnaire).']);
        } elseif ($request->has('is_teacher')) {
            $role = 'teacher';
        } elseif ($request->has('is_manager')) {
            $role = 'manager';
        }elseif (str_ends_with($request->email, '@unistra.fr')){
            $role = 'teacher';
        }

        $validated['password'] = Hash::make($validated['password']);

        $validated['role'] = $role;

        $user = User::create($validated);

        Auth::login($user);

        return redirect()->route('dashboard')->withStatus('Inscription réussie !');
    }
}
