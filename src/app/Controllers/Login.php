<?php namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\UserModel;

class Login extends Controller {
    
    protected $userModel;

    public function __construct() 
    {
        $this->userModel = new UserModel(); 
    }

    public function index()
    {   
        $data = [
            'title' => 'Login - SofDesign'
        ];

        return view('login', $data);     
    }

    public function store()
    {
        if (!$this->validate($this->userModel->getDefaultRules())) {
            return redirect()->to('/')->with('errors', $this->validator->getErrors());
        }

        $userFound = $this->userModel->select('id, name, email,password')->where('email', $this->request->getPost('email'))->first();
        
        if (!$userFound){
            return redirect()->to('/')->with('error', 'E-mail ou senha inválidos');
        }

        if(!password_verify($this->request->getPost('password'), $userFound->password)){
            return redirect()->to('/')->with('error', 'E-mail ou senha inválidos');
        }

        unset($userFound->password);
        session()->set('user', $userFound);

        return redirect()->route('books');
    }

    public function destroy()
    {
        session()->destroy();
        return redirect()->route('login');
    }
}