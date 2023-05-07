<?php

class Pelanggan extends Controller {
	
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
		$data['title'] = 'Data Pelanggan Barang';
		$data['pelanggan'] = $this->model('PelangganModel')->getAllPelanggan();
		$this->view('templates/header', $data);
		$this->view('templates/sidebar', $data);
		$this->view('pelanggan/index', $data);
		$this->view('templates/footer');
	}

    public function tambah(){
		$data['title'] = 'Tambah Pelanggan';		
		$data['pengguna'] = $this->model('PenggunaModel')->getAllPengguna();		
		$this->view('templates/header', $data);
		$this->view('templates/sidebar', $data);
		$this->view('pelanggan/create', $data);
		$this->view('templates/footer');
	}

    public function simpanPelanggan(){		

		if( $this->model('PelangganModel')->tambahPelanggan($_POST) > 0 ) {
			Flasher::setMessage('Berhasil','ditambahkan','success');
			header('location: '. base_url . '/pelanggan');
			exit;			
		}else{
			Flasher::setMessage('Gagal','ditambahkan','danger');
			header('location: '. base_url . '/pelanggan');
			exit;	
		}
	}

	public function edit($id){

		$data['title'] = 'Detail Pelanggan';
		$data['pengguna'] = $this->model('PenggunaModel')->getAllPengguna();
		$data['pelanggan'] = $this->model('PelangganModel')->getPelangganById($id);
		$this->view('templates/header', $data);
		$this->view('templates/sidebar', $data);
		$this->view('pelanggan/edit', $data);
		$this->view('templates/footer');
	}


    public function updatePelanggan(){	
		if( $this->model('PelangganModel')->updateDataPelanggan($_POST) > 0 ) {
			Flasher::setMessage('Berhasil','diupdate','success');
			header('location: '. base_url . '/pelanggan');
			exit;			
		}else{
			Flasher::setMessage('Gagal','diupdate','danger');
			header('location: '. base_url . '/pelanggan');
			exit;	
		}
	}

	public function hapus($id){
		if( $this->model('PelangganModel')->deletePelanggan($id) > 0 ) {
			Flasher::setMessage('Berhasil','dihapus','success');
			header('location: '. base_url . '/pelanggan');
			exit;			
		}else{
			Flasher::setMessage('Gagal','dihapus','danger');
			header('location: '. base_url . '/pelanggan');
			exit;	
		}
	}
}