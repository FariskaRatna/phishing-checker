<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\DB;
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
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);


        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'rule' => 1, // Atur rule default ke 1 agar user bisa login
        ]);

        // Buat kuota default untuk user baru (misal: 5 untuk paket Free)
        // Pastikan Anda sudah memiliki model UserQuota atau gunakan DB facade
        DB::table('user_quota')->insert([
            'id_user' => $user->id,
            'quota' => 15, // Quota awal untuk user baru
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        event(new Registered($user));

        // Auth::login($user);

        return redirect()->intended(url()->previous());
    }
}
