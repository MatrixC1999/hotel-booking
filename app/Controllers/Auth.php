<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Auth extends BaseController
{
    public function login()
    {
        return view('login');
    }

    public function processLogin()
    {
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        // Dummy credentials (for now)
        if ($username === 'admin' && $password === 'admin123') {
            session()->set('isLoggedIn', true);
            return redirect()->to('/admin/dashboard');
        } else {
            return redirect()->to('/login')->with('error', 'Invalid credentials.');
        }
    }
}
