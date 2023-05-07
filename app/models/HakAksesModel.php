<?php

class HakAksesModel {
	
	private $table = 'hakakses';
	private $db;

	public function __construct()
	{
		$this->db = new Database;
	}

	public function getAllHakAkses()
	{
		$this->db->query('SELECT * FROM ' . $this->table);
		return $this->db->resultSet();
	}

    public function getHakAksesById($id)
	{
		$this->db->query('SELECT * FROM ' . $this->table . ' WHERE IdAkses=:IdAkses');
		$this->db->bind('IdAkses',$id);
		return $this->db->single();
	}

	public function tambahHakAkses($data)
	{
		$query = "INSERT INTO HakAkses (NamaAkses, Keterangan) VALUES(:NamaAkses, :Keterangan)";
		$this->db->query($query);
		$this->db->bind('NamaAkses',$data['NamaAkses']);
        $this->db->bind('Keterangan',$data['Keterangan']);
		$this->db->execute();

		return $this->db->rowCount();
	}

	public function updateDataHakAkses($data)
	{
		$query = "UPDATE HakAkses SET NamaAkses=:NamaAkses, Keterangan=:Keterangan WHERE IdAkses=:IdAkses";
		$this->db->query($query);
		$this->db->bind('IdAkses',$data['IdAkses']);
		$this->db->bind('NamaAkses',$data['NamaAkses']);
        $this->db->bind('Keterangan',$data['Keterangan']);
		$this->db->execute();

		return $this->db->rowCount();
	}

	public function deleteHakAkses($id)
	{
		$this->db->query('DELETE FROM ' . $this->table . ' WHERE IdAkses=:IdAkses');
		$this->db->bind('IdAkses',$id);
		$this->db->execute();

		return $this->db->rowCount();
	}
}