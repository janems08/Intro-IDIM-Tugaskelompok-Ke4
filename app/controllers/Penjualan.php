<?php

class Penjualan extends Controller {
	
	public function index()
	{
		$data['title'] = 'Data Penjualan Barang';
		$data['penjualan'] = $this->model('PenjualanModel')->getAllPenjualan();
		$this->view('templates/header', $data);
		$this->view('templates/sidebar', $data);
		$this->view('penjualan/index', $data);
		$this->view('templates/footer');
	}

    public function tambah(){
		$data['title'] = 'Tambah Penjualan';		
		$data['pengguna'] = $this->model('PenggunaModel')->getAllPengguna();		
		$this->view('templates/header', $data);
		$this->view('templates/sidebar', $data);
		$this->view('penjualan/create', $data);
		$this->view('templates/footer');
	}

    public function simpanpenjualan(){		

		if( $this->model('PenjualanModel')->tambahpenjualan($_POST) > 0 ) {
			Flasher::setMessage('Berhasil','ditambahkan','success');
			header('location: '. base_url . '/penjualan');
			exit;			
		}else{
			Flasher::setMessage('Gagal','ditambahkan','danger');
			header('location: '. base_url . '/penjualan');
			exit;	
		}
	}

	public function edit($id){

		$data['title'] = 'Detail penjualan';
		$data['pengguna'] = $this->model('PenggunaModel')->getAllPengguna();
		$data['penjualan'] = $this->model('PenjualanModel')->getpenjualanById($id);
		$this->view('templates/header', $data);
		$this->view('templates/sidebar', $data);
		$this->view('penjualan/edit', $data);
		$this->view('templates/footer');
	}


    public function updatepenjualan(){	
		if( $this->model('penjualanModel')->updateDatapenjualan($_POST) > 0 ) {
			Flasher::setMessage('Berhasil','diupdate','success');
			header('location: '. base_url . '/penjualan');
			exit;			
		}else{
			Flasher::setMessage('Gagal','diupdate','danger');
			header('location: '. base_url . '/penjualan');
			exit;	
		}
	}

	public function hapus($id){
		if( $this->model('penjualanModel')->deletepenjualan($id) > 0 ) {
			Flasher::setMessage('Berhasil','dihapus','success');
			header('location: '. base_url . '/penjualan');
			exit;			
		}else{
			Flasher::setMessage('Gagal','dihapus','danger');
			header('location: '. base_url . '/penjualan');
			exit;	
		}
	}
}