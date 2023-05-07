<?php

class LoginModel {
	
	private $table = 'pengguna';
	private $db;

	public function __construct()
	{
		$this->db = new Database;
	}

	public function checkLogin($data)
	{
		$query = "SELECT * FROM pengguna WHERE NamaPengguna = :username AND Password = :password";
		$this->db->query($query);
		$this->db->bind('username', $data['username']);
		$this->db->bind('password', $data['password']);
		//$this->db->execute();
		//return $this->db->rowCount();
		$data =  $this->db->single();
		return $data;
	}

}