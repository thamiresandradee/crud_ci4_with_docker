<?php namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\UserModel;

use App\Libraries\Hash;

class Register extends Controller {

    //Enabling features
    public function __construct()
    {
        
        helper(['url', 'form']);
        
    }
    public function index() {
        // include helper form
        helper(['form']);
        $data = [];
        echo view('register', $data);
    }   

    public function save()
    {
        // Validate user input
        $validated = $this->validate([
            'name'=> [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Your name is required',
                ]
            ],
            'email'=> [
                'rules' => 'required|valid_email',
                'errors' => [
                    'required' => 'Your email is required',
                    'valid_email' => 'Email is already used.',
                ]
            ],
            'password'=> [
                'rules' => 'required|min_length[5]|max_length[20]',
                'errors' => [
                    'required' => 'Your password is required',
                    'min_length' => 'Password must be 5 charectars long',
                    'max_length' => 'Password cannot be longer than 20 charectars',
                ]
            ],
            'confpassword'=> [
                'rules' => 'required|min_length[5]|max_length[20]|matches[password]',
                'errors' => [
                    'required' => 'Your confirm password is required',
                    'min_length' => 'Password must be 5 charectars long',
                    'max_length' => 'Password cannot be longer than 20 charectars',
                    'matches' => 'Confirm password must match the password',
                ]
            ],
        ]);

        if(!$validated)
        {
            return view('/register', ['validation' => $this->validator]);
        }

        // Here we save the user.

        $name = $this->request->getPost('name');
        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');
        $confpassword = $this->request->getPost('confpassword');

        $data = [
            'name' => $name,
            'email' => $email,
            'password' => Hash::encrypt($password)
        ];

        // Storing data
         
        $userModel = new \App\Models\UserModel();
        $query = $userModel->insert($data);
        

        if(!$query)
        {
            return redirect()->back()->with('fail', 'Saving user failed');
        }
        else
        {
            return redirect()->back()->with('success', 'Registered successfully');
        }
    }
        
}

?>