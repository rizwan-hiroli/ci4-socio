<?php

namespace App\Controllers;

use App\Models\UserModel;
use CodeIgniter\Controller;

class Auth extends Controller
{
    public function login()
    {
        // Load helper
        helper(['form']);

        // Check if the form was submitted
        if ($this->request->getMethod() === 'POST') {
            // Validation
            $rules = [
                'email'    => 'required|valid_email',
                'password' => 'required|validateUser[email,password]',
            ];

            $errors = [
                'password' => [
                    'validateUser' => 'Email or Password is incorrect',
                ],
            ];

            if (!$this->validate($rules, $errors)) {
                return view('login', [
                    'validation' => $this->validator,
                ]);
            }

            // Get user data
            $model = new UserModel();
            $user = $model->where('email', $this->request->getVar('email'))->first();

            // Set user session
            $this->setUserSession($user);

            return redirect()->to('/employee');
        }

        return view('login');
    }

    private function setUserSession($user)
    {
        $data = [
            'id'       => $user['id'],
            'username' => $user['username'],
            'email'    => $user['email'],
            'logged_in'=> true,
        ];

        session()->set($data);
        return true;
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/login');
    }
}
