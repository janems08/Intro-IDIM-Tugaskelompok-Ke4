<?php

class Home extends Controller {

	public function index()
	{
		$data['title'] = 'Halaman Home';
		
		$keuntungan = $this->model('HomeModel')->getAllKeuntungan();
        $data['labels'] = array_column($keuntungan, 'NamaBarang');
        $data['keuntungan'] = array_column($keuntungan, 'Keuntungan');
		$this->view('templates/header', $data);
		$this->view('templates/sidebar', $data);
		$this->view('home/index', $data);
		$this->view('templates/footer');
	}
}