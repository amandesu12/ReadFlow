<?php

namespace App\Controllers;
use App\Models\UserModel;

class Auth extends BaseController
{
    public function login()
    {
        return view('auth/login');
    }

    public function loginPost()
    {
        $session = session();
        $model = new UserModel();

        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');

        // Validasi input kosong
        if (empty($email) || empty($password)) {
            return redirect()->back()->with('error', 'Email dan Password wajib diisi.');
        }

        $user = $model->where('email', $email)->first();

        if ($user && password_verify($password, $user['password'])) {
            $session->set('user', $user);
            return redirect()->to('/')->with('success', 'Berhasil login!');
        } else {
            return redirect()->back()->with('error', 'Email atau Password salah.');
        }
    }


    public function register()
    {
        return view('auth/register');
    }

    public function registerPost()
{
    $session = session();
    $model = new UserModel();

    $name     = $this->request->getPost('name');
    $email    = $this->request->getPost('email');
    $password = $this->request->getPost('password');

    // Validasi sederhana
    if (empty($name) || empty($email) || empty($password)) {
        return redirect()->back()->withInput()->with('error', 'Semua field wajib diisi.');
    }

    // Cek apakah email sudah digunakan
    $existingUser = $model->where('email', $email)->first();
    if ($existingUser) {
        return redirect()->back()->withInput()->with('error', 'Email sudah terdaftar.');
    }

    // Simpan user
    $model->insert([
        'name'     => $name,
        'email'    => $email,
        'password' => password_hash($password, PASSWORD_DEFAULT)
    ]);

    return redirect()->to('/login')->with('success', 'Registrasi berhasil! Silakan login.');
}
public function logout()
{
    session()->destroy(); // hapus semua data session
    return redirect()->to('/login')->with('success', 'Berhasil logout.');
}

}
