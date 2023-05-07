<?php

class PenggunaModel {
	
	private $table = 'pengguna';
	private $db;

	public function __construct()
	{
		$this->db = new Database;
	}

	public function getAllPengguna()
	{
		$this->db->query('SELECT pengguna.*, hakakses.NamaAkses FROM ' . $this->table . " LEFT JOIN hakakses ON pengguna.IdAkses = hakakses.IdAkses");
		return $this->db->resultSet();
	}

    public function getPenggunaById($id)
	{
		$this->db->query('SELECT * FROM ' . $this->table . ' WHERE IdPengguna=:IdPengguna');
		$this->db->bind('IdPengguna',$id);
		return $this->db->single();
	}

	public function tambahPengguna($data)
	{
		$query = "INSERT INTO Pengguna (NamaPengguna, Password, NamaDepan, NamaBelakang, NoHP, Alamat, IdAkses) VALUES(:NamaPengguna, :Password, :NamaDepan, :NamaBelakang, :NoHP, :Alamat, :IdAkses)";
		$this->db->query($query);
		$this->db->bind('NamaPengguna',$data['NamaPengguna']);
        $this->db->bind('Password',$data['Password']);
        $this->db->bind('NamaDepan',$data['NamaDepan']);
        $this->db->bind('NamaBelakang',$data['NamaBelakang']);
        $this->db->bind('NoHP',$data['NoHP']);
        $this->db->bind('Alamat',$data['Alamat']);
        $this->db->bind('IdAkses',$data['IdAkses']);
		$this->db->execute();

		return $this->db->rowCount();
	}

	public function updateDataPengguna($data)
	{
		$query = "UPDATE Pengguna SET NamaPengguna=:NamaPengguna, Password=:Password, NamaDepan=:NamaDepan, NamaBelakang=:NamaBelakang, NoHP=:NoHP, Alamat=:Alamat, IdAkses=:IdAkses WHERE IdPengguna=:IdPengguna";
		$this->db->query($query);
		$this->db->bind('IdPengguna',$data['IdPengguna']);
		$this->db->bind('NamaPengguna',$data['NamaPengguna']);
        $this->db->bind('Password',$data['Password']);
        $this->db->bind('NamaDepan',$data['NamaDepan']);
        $this->db->bind('NamaBelakang',$data['NamaBelakang']);
        $this->db->bind('NoHP',$data['NoHP']);
        $this->db->bind('Alamat',$data['Alamat']);
        $this->db->bind('IdAkses',$data['IdAkses']);
		$this->db->execute();

		return $this->db->rowCount();
	}

	public function deletePengguna($id)
	{
		$this->db->query('DELETE FROM ' . $this->table . ' WHERE IdPengguna=:IdPengguna');
		$this->db->bind('IdPengguna',$id);
		$this->db->execute();

		return $this->db->rowCount();
	}
}