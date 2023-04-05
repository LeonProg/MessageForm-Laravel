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
    public function registration(RegistrationRequest $request)
    {
        $validation = $request->validated();
        $validation['password'] = Hash::make($request->password);

        $user = User::query()->create($validation);

        Auth::login($user);

        return $this->home();
    }

    public function login(LoginRequest $request)
    {
        if (!Auth::attempt($request->validated())) {
            return back()->withErrors(['invalidCredentials' => 'Не верный логин или пароль']);
        }

        return $this->home();
    }

    public function logout()
    {
        Auth::logout();

        return redirect()->route('login');
    }

    private function home()
    {
        return redirect()->route('home');
    }
}
