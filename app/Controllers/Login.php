<?php

namespace App\Controllers;

use App\Models\UsersModel;

class Login extends BaseController
{

    public function index()
    {
        $session = session();
        //cek apakah ada session bernama logged_in
        if ($session->has('logged_in')) {
            //cek position dari session
            if ($session->get('position') == 'admin') {
                return redirect()->to('/admin');
            } else if ($session->get('position') == 'user') {
                return redirect()->to('/user');
            }
        }

        return view('login');
    }

    public function process()
    {
        $users = new UsersModel();
        $email = $this->request->getVar('email');
        $password = $this->request->getVar('password');
        $dataUser = $users->where([
            'email' => $email,
        ])->first();
        if ($dataUser) {
            if (password_verify($password, $dataUser->password)) {
                if ($dataUser->position == 'admin') {
                    session()->set([
                        'email' => $dataUser->email,
                        'username' => $dataUser->username,
                        'position' => $dataUser->position,
                        'logged_in' => TRUE
                    ]);
                    return redirect()->to(base_url('/admin'));
                } else if ($dataUser->position == 'user') {
                    session()->set([
                        'email' => $dataUser->email,
                        'username' => $dataUser->username,
                        'position' => $dataUser->position,
                        'logged_in' => TRUE
                    ]);
                    return redirect()->to(base_url('/user'));
                } else {
                    session()->setFlashdata('error', 'terjadi kesalahan, mohon coba lagi nanti');
                    return redirect()->back();
                }
            } else {
                session()->setFlashdata('error', 'Email & Password Salah');
                return redirect()->back();
            }
        } else {
            session()->setFlashdata('error', 'Akun tidak ditemukan');
            return redirect()->back();
        }
    }

    function logout()
    {
        session()->destroy();
        return redirect()->to('/login');
    }
}
