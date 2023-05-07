<?php

class Pengguna extends Controller {

    public function index()
	{
		$data['title'] = 'Data Pengguna';
		$data['pengguna'] = $this->model('PenggunaModel')->getAllPengguna();
		$this->view('templates/header', $data);
		$this->view('templates/sidebar', $data);
		$this->view('pengguna/index', $data);
		$this->view('templates/footer');
	}

    public function tambah() 
	{
		$data['title'] = 'Tambah Pengguna';		
		$data['hakakses'] = $this->model('HakAksesModel')->getAllHakAkses();		
		$this->view('templates/header', $data);
		$this->view('templates/sidebar', $data);
		$this->view('pengguna/create', $data);
		$this->view('templates/footer');
	}

	public function simpanPengguna()
	{		
		if( $this->model('PenggunaModel')->tambahPengguna($_POST) > 0 ) {
			Flasher::setMessage('Berhasil','ditambahkan','success');
			header('location: '. base_url . '/pengguna');
			exit;			
		}else{
			Flasher::setMessage('Gagal','ditambahkan','danger');
			header('location: '. base_url . '/pengguna');
			exit;	
		}
	}

    public function edit($id)
	{
		$data['title'] = 'Detail Pengguna';
		$data['pengguna'] = $this->model('PenggunaModel')->getPenggunaById($id);
		$data['hakakses'] = $this->model('HakAksesModel')->getAllHakAkses();
		$this->view('templates/header', $data);
		$this->view('templates/sidebar', $data);
		$this->view('pengguna/edit', $data);
		$this->view('templates/footer');
	}


    public function updatePengguna(){	
		if( $this->model('PenggunaModel')->updateDataPengguna($_POST) > 0 ) {
			Flasher::setMessage('Berhasil','diupdate','success');
			header('location: '. base_url . '/pengguna');
			exit;			
		}else{
			Flasher::setMessage('Gagal','diupdate','danger');
			header('location: '. base_url . '/pengguna');
			exit;	
		}
	}

	public function hapus($id){
		if( $this->model('PenggunaModel')->deletePengguna($id) > 0 ) {
			Flasher::setMessage('Berhasil','dihapus','success');
			header('location: '. base_url . '/pengguna');
			exit;			
		}else{
			Flasher::setMessage('Gagal','dihapus','danger');
			header('location: '. base_url . '/pengguna');
			exit;	
		}
	}

}