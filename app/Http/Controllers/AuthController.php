<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;
use App\Http\Controllers\DashboardController;
use App\Services\WeatherApiService;

class AuthController extends Controller
{
    //
    public function register(Request $request)
    {
        $data = $request->validate([
            'username' => 'required|string|max:255',
            'email' => 'required|string',
            'password' => 'required|string',
            'password_confirm' => 'required|string|same:password'
        ]);

        if ($data['password'] === $data['password_confirm'])
        {
            $user = User::create($data);
            auth()->login($user);
            (new DashboardController(new WeatherApiService()))->index();
            return redirect('dashboard');
        }

        return view('auth.register', ['error' => 'passwords do not match']);
    }

    public function login(Request $request)
    {
        $credentials = $request->only(['username', 'password']);
        $user = Auth::user();

        if (Auth::attempt($credentials))
        {
            return redirect('dashboard');
        }

        return view('auth.login', ['error' => 'invalid credentials']);
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
}
