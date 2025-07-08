<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();

        // Ambil user yang sedang login
        $user = Auth::user();

        // Cek kolom status
        if ($user->rule <= 0) {
            // Logout user
            Auth::logout();

            // Invalidate session
            $request->session()->invalidate();
            $request->session()->regenerateToken();

            // Kembali ke halaman sebelumnya dengan error
            return back()->withErrors([
                'status' => 'Akun Anda tidak aktif. Silakan hubungi admin.',
            ]);
        }

        // Kalau status > 0, lanjutkan login
        $request->session()->regenerate();

        // Ambil data kuota user dari database
        $userQuota = DB::table('user_quota')->where('id_user', $user->id)->first();

        // Simpan data yang dibutuhkan ke dalam session
        $request->session()->put([
            'user_id' => $user->id,
            'user_name' => $user->name,
            'quota' => $userQuota->quota ?? 0, // Jika user tidak punya kuota, default 0
            'ip' => $request->ip()
        ]);

        return redirect('/')->with('welcome', 'Selamat datang, ' . $user->name . '!');
    }


    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/')->with('logoutSuccess', 'Anda berhasil logout.');
    }
}
