<?php

class HakAkses extends Controller {
	
	public function __construct()
	{	
		if($_SESSION['session_login'] != 'sudah_login') {
			Flasher::setMessage('Login','Tidak ditemukan.','danger');
			header('location: '. base_url . '/login');
			exit;
		}
	}

    public function index()
	{
		$data['title'] = 'Data Hak Akses';
		$data['hakakses'] = $this->model('HakAksesModel')->getAllHakAkses();
		$this->view('templates/header', $data);
		$this->view('templates/sidebar', $data);
		$this->view('hakakses/index', $data);
		$this->view('templates/footer');
	}

    public function tambah() 
	{
		$data['title'] = 'Tambah Hak Akses';		
		$this->view('templates/header', $data);
		$this->view('templates/sidebar', $data);
		$this->view('hakakses/create', $data);
		$this->view('templates/footer');
	}

	public function simpanHakAkses()
	{		
		if( $this->model('HakAksesModel')->tambahHakAkses($_POST) > 0 ) {
			Flasher::setMessage('Berhasil','ditambahkan','success');
			header('location: '. base_url . '/hakakses');
			exit;			
		}else{
			Flasher::setMessage('Gagal','ditambahkan','danger');
			header('location: '. base_url . '/hakakses');
			exit;	
		}
	}

    public function edit($id)
	{
		$data['title'] = 'Detail Hak Akses';
		$data['hakakses'] = $this->model('HakAksesModel')->getHakAksesById($id);
		$this->view('templates/header', $data);
		$this->view('templates/sidebar', $data);
		$this->view('hakakses/edit', $data);
		$this->view('templates/footer');
	}


    public function updateHakAkses(){	
		if( $this->model('HakAksesModel')->updateDataHakAkses($_POST) > 0 ) {
			Flasher::setMessage('Berhasil','diupdate','success');
			header('location: '. base_url . '/hakakses');
			exit;			
		}else{
			Flasher::setMessage('Gagal','diupdate','danger');
			header('location: '. base_url . '/hakakses');
			exit;	
		}
	}

	public function hapus($id){
		if( $this->model('HakAksesModel')->deleteHakAkses($id) > 0 ) {
			Flasher::setMessage('Berhasil','dihapus','success');
			header('location: '. base_url . '/hakakses');
			exit;			
		}else{
			Flasher::setMessage('Gagal','dihapus','danger');
			header('location: '. base_url . '/hakakses');
			exit;	
		}
	}

}