<?php

class PembelianModel {
	
	private $table = 'pembelian';
	private $db;

	public function __construct()
	{
		$this->db = new Database;
	}

	public function getAllPembelian()
	{
		$this->db->query("SELECT pembelian.* , pengguna.NamaPengguna, barang.NamaBarang FROM " . $this->table . " LEFT JOIN pengguna ON pembelian.IdPengguna = pengguna.IdPengguna LEFT JOIN barang ON pembelian.IdBarang = barang.IdBarang");
		return $this->db->resultSet();
	}

	public function getPembelianById($id)
	{
		$this->db->query('SELECT * FROM ' . $this->table . ' WHERE IdPembelian=:IdPembelian');
		$this->db->bind('IdPembelian',$id);
		return $this->db->single();
	}

    public function tambahPembelian($data)
	{
		$query = "INSERT INTO pembelian (JumlahPembelian, HargaBeli, IdPengguna, TanggalPembelian, IdBarang) VALUES(:JumlahPembelian, :HargaBeli, :IdPengguna, :TanggalPembelian, :IdBarang)";
		$this->db->query($query);
		$this->db->bind('JumlahPembelian', $data['JumlahPembelian']);
		$this->db->bind('HargaBeli', $data['HargaBeli']);
        $this->db->bind('IdPengguna', $data['IdPengguna']);
		$this->db->bind('TanggalPembelian', $data['TanggalPembelian']);
        $this->db->bind('IdBarang', $data['IdBarang']);
		$this->db->execute();

		return $this->db->rowCount();
	}

	public function updateDataPembelian($data)
	{
		$query = "UPDATE pembelian SET JumlahPembelian=:JumlahPembelian, HargaBeli=:HargaBeli, IdPengguna=:IdPengguna, TanggalPembelian=:TanggalPembelian, IdBarang=:IdBarang WHERE IdPembelian=:IdPembelian";
		$this->db->query($query);
		$this->db->bind('IdPembelian',$data['IdPembelian']);
		$this->db->bind('JumlahPembelian',$data['JumlahPembelian']);
        $this->db->bind('HargaBeli',$data['HargaBeli']);
        $this->db->bind('IdPengguna',$data['IdPengguna']);
        $this->db->bind('TanggalPembelian',$data['TanggalPembelian']);
        $this->db->bind('IdBarang',$data['IdBarang']);

		$this->db->execute();

		return $this->db->rowCount();
	}

	public function deletePembelian($id)
	{
		$this->db->query('DELETE FROM ' . $this->table . ' WHERE IdPembelian=:IdPembelian');
		$this->db->bind('IdPembelian',$id);
		$this->db->execute();

		return $this->db->rowCount();
	}
}
