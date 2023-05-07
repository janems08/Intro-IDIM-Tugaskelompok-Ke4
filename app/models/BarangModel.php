<?php

class BarangModel {
	
	private $table = 'barang';
	private $db;

	public function __construct()
	{
		$this->db = new Database;
	}

	public function getAllBarang()
	{
		$this->db->query("SELECT barang.* , pengguna.NamaPengguna FROM " . $this->table . " LEFT JOIN pengguna ON barang.IdPengguna = pengguna.IdPengguna");
		return $this->db->resultSet();
	}

	public function getBarangById($id)
	{
		$this->db->query('SELECT * FROM ' . $this->table . ' WHERE IdBarang=:IdBarang');
		$this->db->bind('IdBarang',$id);
		return $this->db->single();
	}

    public function tambahBarang($data)
	{
		$query = "INSERT INTO barang (NamaBarang, Keterangan, Satuan, IdPengguna) VALUES(:NamaBarang, :Keterangan, :Satuan, :IdPengguna)";
		$this->db->query($query);
		$this->db->bind('NamaBarang', $data['NamaBarang']);
		$this->db->bind('Keterangan', $data['Keterangan']);
        $this->db->bind('Satuan', $data['Satuan']);
		$this->db->bind('IdPengguna', $data['IdPengguna']);
		$this->db->execute();

		return $this->db->rowCount();
	}

	public function updateDataBarang($data)
	{
		$query = "UPDATE barang SET NamaBarang=:NamaBarang, Keterangan=:Keterangan, Satuan=:Satuan, IdPengguna=:IdPengguna WHERE IdBarang=:IdBarang";
		$this->db->query($query);
		$this->db->bind('IdBarang',$data['IdBarang']);
		$this->db->bind('NamaBarang',$data['NamaBarang']);
        $this->db->bind('Keterangan',$data['Keterangan']);
        $this->db->bind('Satuan',$data['Satuan']);
        $this->db->bind('IdPengguna',$data['IdPengguna']);

		$this->db->execute();

		return $this->db->rowCount();
	}

	public function deleteBarang($id)
	{
		$this->db->query('DELETE FROM ' . $this->table . ' WHERE IdBarang=:IdBarang');
		$this->db->bind('IdBarang',$id);
		$this->db->execute();

		return $this->db->rowCount();
	}
}
