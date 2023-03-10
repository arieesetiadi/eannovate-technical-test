<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        // Ambil data dari form login
        $admin = $request->only('username', 'password');

        // Proses login
        $result = auth()->attempt($admin);

        if ($result) {
            return redirect()->to('/');
        } else {
            return  back()->with('status', [
                'type' => 'danger',
                'message' => 'Invalid username or password, please try again.'
            ]);
        }
    }

    public function logout()
    {
        auth()->logout();
        return redirect()->to('/login');
    }
}
