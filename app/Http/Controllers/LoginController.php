<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;

class LoginController extends Controller
{
    public function showLogin()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('login', 'password');

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended(route('posts.index'));
        }

        return back()->withErrors([
            'login' => 'Les credencials no són correctes.',
        ])->onlyInput('login');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login');
    }
    public function redirectToGitHub()
{
    return Socialite::driver('github')->redirect();
}

public function handleGitHubCallback()
{
    try {
        $githubUser = Socialite::driver('github')->user();
        
        // Buscar o crear usuari
        $user = User::firstOrCreate(
            ['login' => $githubUser->getNickname()],
            ['password' => bcrypt(str()->random(16))]
        );
        
        Auth::login($user);
        
        return redirect()->route('posts.index');
        
    } catch (\Exception $e) {
        return redirect()->route('login')->withErrors(['github' => 'Error amb l\'autenticació de GitHub']);
    }
}
public function showRegister()
{
    return view('auth.register');
}

public function register(Request $request)
{
    $request->validate([
        'login' => 'required|unique:users|min:3',
        'password' => 'required|min:6|confirmed',
    ]);

    $user = User::create([
        'login' => $request->login,
        'password' => bcrypt($request->password),
    ]);

    Auth::login($user);
    
    return redirect()->route('posts.index');
}
}