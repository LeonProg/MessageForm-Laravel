<?php

namespace App\Http\Controllers;

use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\RegistrationRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function registration(RegistrationRequest $request): \Illuminate\Http\RedirectResponse
    {
        $validation = $request->validated();
        $validation['password'] = Hash::make($request->password);
        $validation['role_id'] = 1;

        $user = User::query()->create($validation);

        Auth::login($user);

        return $this->home();
    }

    public function login(LoginRequest $request): \Illuminate\Http\RedirectResponse
    {
        if (!Auth::attempt($request->validated())) {
            return back()->withErrors(['invalidCredentials' => 'Не верный логин или пароль']);
        }

        return $this->home();
    }

    public function logout(): \Illuminate\Http\RedirectResponse
    {
        Auth::logout();

        return redirect()->route('login');
    }

    private function home(): \Illuminate\Http\RedirectResponse
    {
        return redirect()->route('home');
    }
}
