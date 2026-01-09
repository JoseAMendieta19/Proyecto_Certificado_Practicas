<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'institucion' => ['required', 'string', 'max:255'],
            'carrera' => ['required', 'string', 'max:255'],
            'nivel' => ['required', 'string', 'max:255'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'institucion' => $request->institucion,
            'carrera' => $request->carrera,
            'nivel' => $request->nivel,
            'password' => Hash::make($request->password),
            'rol' => 'estudiante',
        ]);

        event(new Registered($user));

        Auth::login($user);

        if ($user->rol === 'admin') {
            return redirect('/dashboard-admin');
        }

        if ($user->rol === 'estudiante') {
            return redirect('/dashboard-estudiante');
        }

        return redirect('/dashboard');

    }
}
