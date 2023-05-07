<?php

class PenjualanModel {
	
	private $table = 'penjualan';
	private $db;

	public function __construct()
	{
		$this->db = new Database;
	}

	public function getAllPenjualan()
	{
		$this->db->query("SELECT penjualan.* , pengguna.NoHP FROM " . $this->table . " LEFT JOIN pengguna ON penjualan.IdPengguna = pengguna.IdPengguna");
		return $this->db->resultSet();
	}

	public function getPenjualanById($id)
	{
		$this->db->query('SELECT * FROM ' . $this->table . ' WHERE IdPenjualan=:IdPenjualan');
		$this->db->bind('IdPenjualan',$id);
		return $this->db->single();
	}

    public function tambahPenjualan($data)
	{
		$query = "INSERT INTO penjualan (NamaPenjualan, email, TanggalLahir, IdPengguna) VALUES(:NamaPenjualan, :email, :TanggalLahir, :IdPengguna)";
		$this->db->query($query);
		$this->db->bind('NamaPenjualan', $data['NamaPenjualan']);
		$this->db->bind('email', $data['email']);
        $this->db->bind('TanggalLahir', $data['TanggalLahir']);
		$this->db->bind('IdPengguna', $data['IdPengguna']);
		$this->db->execute();

		return $this->db->rowCount();
	}

	public function updateDataPenjualan($data)
	{
		$query = "UPDATE penjualan SET NamaPenjualan=:NamapPnjualan, email=:email, TanggalLahir=:TanggalLahir, IdPengguna=:IdPengguna WHERE IdPenjualan=:IdPenjualan";
		$this->db->query($query);
		$this->db->bind('IdPenjualan',$data['IdPenjualan']);
		$this->db->bind('NamaPenjualan',$data['NamaPenjualan']);
        $this->db->bind('email',$data['email']);
        $this->db->bind('TanggalLahir',$data['TanggalLahir']);
        $this->db->bind('IdPengguna',$data['IdPengguna']);

		$this->db->execute();

		return $this->db->rowCount();
	}

	public function deletepenjualan($id)
	{
		$this->db->query('DELETE FROM ' . $this->table . ' WHERE IdPenjualan=:IdPenjualan');
		$this->db->bind('IdPenjualan',$id);
		$this->db->execute();

		return $this->db->rowCount();
	}
}
