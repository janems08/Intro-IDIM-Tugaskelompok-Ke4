<?php

class PelangganModel {
	
	private $table = 'pelanggan';
	private $db;

	public function __construct()
	{
		$this->db = new Database;
	}

	public function getAllPelanggan()
	{
		$this->db->query("SELECT pelanggan.* , pengguna.NoHP FROM " . $this->table . " LEFT JOIN pengguna ON pelanggan.IdPengguna = pengguna.IdPengguna");
		return $this->db->resultSet();
	}

	public function getPelangganById($id)
	{
		$this->db->query('SELECT * FROM ' . $this->table . ' WHERE IdPelanggan=:IdPelanggan');
		$this->db->bind('IdPelanggan',$id);
		return $this->db->single();
	}

    public function tambahPelanggan($data)
	{
		$query = "INSERT INTO pelanggan (NamaPelanggan, email, TanggalLahir, IdPengguna) VALUES(:NamaPelanggan, :email, :TanggalLahir, :IdPengguna)";
		$this->db->query($query);
		$this->db->bind('NamaPelanggan', $data['NamaPelanggan']);
		$this->db->bind('email', $data['email']);
        $this->db->bind('TanggalLahir', $data['TanggalLahir']);
		$this->db->bind('IdPengguna', $data['IdPengguna']);
		$this->db->execute();

		return $this->db->rowCount();
	}

	public function updateDataPelanggan($data)
	{
		$query = "UPDATE pelanggan SET NamaPelanggan=:NamaPelanggan, email=:email, TanggalLahir=:TanggalLahir, IdPengguna=:IdPengguna WHERE IdPelanggan=:IdPelanggan";
		$this->db->query($query);
		$this->db->bind('IdPelanggan',$data['IdPelanggan']);
		$this->db->bind('NamaPelanggan',$data['NamaPelanggan']);
        $this->db->bind('email',$data['email']);
        $this->db->bind('TanggalLahir',$data['TanggalLahir']);
        $this->db->bind('IdPengguna',$data['IdPengguna']);

		$this->db->execute();

		return $this->db->rowCount();
	}

	public function deletePelanggan($id)
	{
		$this->db->query('DELETE FROM ' . $this->table . ' WHERE IdPelanggan=:IdPelanggan');
		$this->db->bind('IdPelanggan',$id);
		$this->db->execute();

		return $this->db->rowCount();
	}
}
