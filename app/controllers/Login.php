<?php

class Login extends Controller {
    public function __construct()
	{	

	}
	
	public function index()
	{
		$data['title'] = 'Halaman Login';

		$this->view('login/login', $data);
	}

	public function prosesLogin() {
        $resultDb = $this->model('LoginModel')->checkLogin($_POST);
		if($resultDb != null){
				// $_SESSION['username'] = $row['NamaPengguna'];
				$_SESSION['session_login'] = 'sudah_login'; 

				header('location: '. base_url . '/home');
		} else {
            
			// Flasher::setMessage('Username / Password','salah.','danger');
			// header('location: '. base_url . '/login');
			// exit;	
		}
	}
}