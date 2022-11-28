<?php

namespace App\Http\Controllers;
use App\Http\Requests\Auth\AuthRequest;
use App\Http\Requests\Auth\RegisterRequest;
use App\Models\Book;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function auth()
    {
        return view('auth.login');
    }

    public function register()
    {
        return view('auth.register');
    }

    public function login(AuthRequest $request)
    {
        $credentials = [
            'email' => $request->get('email'),
            'password' => $request->get('password'),
        ];

        if (Auth::attempt($credentials)) {
            return redirect()->route('books.index')->with('status', 'Вы успешно вошли ');
        }

        return redirect()->route('auth')->with('status', 'Неверные данные!');

    }

    public function create(RegisterRequest $request){
        if ($request->password == $request->confirm_password) {
            User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'role_id' => 1
            ]);

            return redirect()->route('auth')->with('status','Регистрация прошла успешно!');
        }

        return redirect()->route('register')->with('status','Ваши пароли не совпадают');
    }

    public function logout() {
        Auth::logout();

        return redirect()->route('books.index')->with('status','Вы успешно вышли!');    }
}
