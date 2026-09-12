<?php

namespace App\Controllers;

use App\Models\AdminModel;

class Login extends BaseController
{
    public function index()
    {
        return view('auth/login');
    }

    public function authenticate()
    {
        $userId = trim($this->request->getPost('user_id'));
        $password = $this->request->getPost('password');

        $adminModel = new AdminModel();

        $admin = $adminModel
            ->where('user_id', $userId)
            ->first();

        if ($admin && password_verify($password, $admin['password'])) {

            session()->set([
                'admin_id'  => $admin['id'],
                'user_id'   => $admin['user_id'],
                'logged_in' => true
            ]);

            return redirect()->to('/dashboard');
        }

        return redirect()->back()
            ->with('error', 'Invalid User ID or Password');
    }

    public function logout()
    {
        session()->destroy();

        return redirect()->to('/login')
            ->with('success', 'You have been logged out.');
    }
}