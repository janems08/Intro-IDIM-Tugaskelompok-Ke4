<?php

class SupplierModel {
	
	private $table = 'supplier';
	private $db;

	public function __construct()
	{
		$this->db = new Database;
	}

	public function getAllSupplier()
	{
		$this->db->query("SELECT supplier.* , pengguna.NoHP FROM " . $this->table . " JOIN pengguna ON supplier.IdPengguna = pengguna.IdPengguna");
		return $this->db->resultSet();
	}

	public function getSupplierById($id)
	{
		$this->db->query('SELECT * FROM ' . $this->table . ' WHERE IdSupplier=:IdSupplier');
		$this->db->bind('IdSupplier',$id);
		return $this->db->single();
	}

    public function tambahSupplier($data)
	{
		$query = "INSERT INTO supplier (NamaPemasok, email, IdPengguna) VALUES(:NamaPemasok, :email, :IdPengguna)";
		$this->db->query($query);
		$this->db->bind('NamaPemasok', $data['NamaPemasok']);
		$this->db->bind('email', $data['email']);
		$this->db->bind('IdPengguna', $data['IdPengguna']);
		$this->db->execute();

		return $this->db->rowCount();
	}

	public function updateDataSupplier($data)
	{
		$query = "UPDATE supplier SET NamaPemasok=:NamaPemasok, email=:email, IdPengguna=:IdPengguna WHERE IdSupplier=:IdSupplier";
		$this->db->query($query);
		$this->db->bind('IdSupplier',$data['IdSupplier']);
		$this->db->bind('NamaPemasok',$data['NamaPemasok']);
        $this->db->bind('email',$data['email']);
        $this->db->bind('IdPengguna',$data['IdPengguna']);

		$this->db->execute();

		return $this->db->rowCount();
	}

	public function deleteSupplier($id)
	{
		$this->db->query('DELETE FROM ' . $this->table . ' WHERE IdSupplier=:IdSupplier');
		$this->db->bind('IdSupplier',$id);
		$this->db->execute();

		return $this->db->rowCount();
	}
}