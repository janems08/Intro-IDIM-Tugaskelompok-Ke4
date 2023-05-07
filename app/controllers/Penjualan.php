<?php

class Penjualan extends Controller {
	
	public function index()
	{
		$data['title'] = 'Data Penjualan';
		$data['penjualan'] = $this->model('PenjualanModel')->getAllPenjualan();
		$this->view('templates/header', $data);
		$this->view('templates/sidebar', $data);
		$this->view('penjualan/index', $data);
		$this->view('templates/footer');
	}

    public function tambah(){
		$data['title'] = 'Tambah Penjualan';		
		$data['pengguna'] = $this->model('PenggunaModel')->getAllPengguna();
		$data['barang'] = $this->model('BarangModel')->getAllBarang();		
		$this->view('templates/header', $data);
		$this->view('templates/sidebar', $data);
		$this->view('penjualan/create', $data);
		$this->view('templates/footer');
	}

    public function simpanPenjualan(){		

		if( $this->model('PenjualanModel')->tambahPenjualan($_POST) > 0 ) {
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

		$data['title'] = 'Detail Penjualan';
		$data['pengguna'] = $this->model('PenggunaModel')->getAllPengguna();
        $data['barang'] = $this->model('BarangModel')->getAllBarang();
		$data['penjualan'] = $this->model('PenjualanModel')->getPenjualanById($id);
		$this->view('templates/header', $data);
		$this->view('templates/sidebar', $data);
		$this->view('penjualan/edit', $data);
		$this->view('templates/footer');
	}


    public function updatePenjualan(){	
		if( $this->model('PenjualanModel')->updateDataPenjualan($_POST) > 0 ) {
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
		if( $this->model('PenjualanModel')->deletePenjualan($id) > 0 ) {
			Flasher::setMessage('Berhasil','dihapus','success');
			header('location: '. base_url . '/penjualan');
			exit;			
		}else{
			Flasher::setMessage('Gagal','dihapus','danger');
			header('location: '. base_url . '/penjualan    ');
			exit;	
		}
	}
}