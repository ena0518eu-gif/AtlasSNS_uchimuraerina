<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Http\Requests\RegisterRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
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
     */
    public function store(RegisterRequest $request): RedirectResponse
    {
        // =========================
        // バリデーション
        // // =========================
        // $request->validate([
        //     'username' => 'required|min:2|max:12',
        //     'email'    => 'required|email|unique:users,email',
        //     'password' => 'required|min:8|confirmed',
        // ]);


        // =========================
        // ユーザー作成
        // =========================
$user = User::create([
    'username'  => $request->username,
    'email'     => $request->email,
    'password'  => Hash::make($request->password),
]);

        // =========================
        // 自動ログイン解除（仕様）
        // =========================
        Auth::logout();

        return redirect()->route('added')
            ->with('username', $user->username);
    }

    /**
     * Display the registration completed view.
     */
    public function added(): View
    {
        return view('auth.added');
    }
}
