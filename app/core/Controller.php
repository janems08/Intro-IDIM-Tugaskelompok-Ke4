<?php

class Controller{

	public function __construct()
	{	
		if(session_status() == PHP_SESSION_NONE || !isset($_SESSION['session_login']) || $_SESSION['session_login'] != 'sudah_login') {
			Flasher::setMessage('Login','Tidak ditemukan.','danger');
			header('location: '. base_url . '/login');
			exit;
		}
	}
	
	public function view($view, $data = [])
	{
		require_once '../app/views/' . $view . '.php';
	}

	public function model($model)
	{
		require_once '../app/models/' . $model . '.php';
		return new $model;
	}
}