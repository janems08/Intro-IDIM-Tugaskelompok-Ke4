<?php

class Pembelian extends Controller {
	
	public function index()
	{
		$data['title'] = 'Data Pembelian';
		$data['pembelian'] = $this->model('PembelianModel')->getAllPembelian();
		$this->view('templates/header', $data);
		$this->view('templates/sidebar', $data);
		$this->view('pembelian/index', $data);
		$this->view('templates/footer');
	}

    public function tambah(){
		$data['title'] = 'Tambah Pembelian';		
		$data['pengguna'] = $this->model('PenggunaModel')->getAllPengguna();
        $data['barang'] = $this->model('BarangModel')->getAllBarang();		
		$this->view('templates/header', $data);
		$this->view('templates/sidebar', $data);
		$this->view('pembelian/create', $data);
		$this->view('templates/footer');
	}

    public function simpanPembelian(){		

		if( $this->model('PembelianModel')->tambahPembelian($_POST) > 0 ) {
			Flasher::setMessage('Berhasil','ditambahkan','success');
			header('location: '. base_url . '/pembelian');
			exit;			
		}else{
			Flasher::setMessage('Gagal','ditambahkan','danger');
			header('location: '. base_url . '/pembelian');
			exit;	
		}
	}

	public function edit($id){

		$data['title'] = 'Detail Pembelian';
		$data['pengguna'] = $this->model('PenggunaModel')->getAllPengguna();
        $data['barang'] = $this->model('BarangModel')->getAllBarang();
		$data['pembelian'] = $this->model('PembelianModel')->getPembelianById($id);
		$this->view('templates/header', $data);
		$this->view('templates/sidebar', $data);
		$this->view('pembelian/edit', $data);
		$this->view('templates/footer');
	}


    public function updatePembelian(){	
		if( $this->model('PembelianModel')->updateDataPembelian($_POST) > 0 ) {
			Flasher::setMessage('Berhasil','diupdate','success');
			header('location: '. base_url . '/pembelian');
			exit;			
		}else{
			Flasher::setMessage('Gagal','diupdate','danger');
			header('location: '. base_url . '/pembelian');
			exit;	
		}
	}

	public function hapus($id){
		if( $this->model('PembelianModel')->deletePembelian($id) > 0 ) {
			Flasher::setMessage('Berhasil','dihapus','success');
			header('location: '. base_url . '/pembelian');
			exit;			
		}else{
			Flasher::setMessage('Gagal','dihapus','danger');
			header('location: '. base_url . '/pembelian    ');
			exit;	
		}
	}
}