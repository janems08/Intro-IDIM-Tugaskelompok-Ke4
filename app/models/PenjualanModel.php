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
		$this->db->query("SELECT penjualan.* , pengguna.NamaPengguna, barang.NamaBarang FROM " . $this->table . " LEFT JOIN pengguna ON penjualan.IdPengguna = pengguna.IdPengguna LEFT JOIN barang ON penjualan.IdBarang = barang.IdBarang");
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
		$query = "INSERT INTO penjualan (JumlahPenjualan, HargaJual, IdPengguna, TanggalPenjualan, IdBarang) VALUES(:JumlahPenjualan, :HargaJual, :IdPengguna, :TanggalPenjualan, :IdBarang)";
		$this->db->query($query);
		$this->db->bind('JumlahPenjualan', $data['JumlahPenjualan']);
		$this->db->bind('HargaJual', $data['HargaJual']);
        $this->db->bind('IdPengguna', $data['IdPengguna']);
		$this->db->bind('TanggalPenjualan', $data['TanggalPenjualan']);
		$this->db->bind('IdBarang', $data['IdBarang']);
		$this->db->execute();

		return $this->db->rowCount();
	}

	public function updateDataPenjualan($data)
	{
		$query = "UPDATE penjualan SET JumlahPenjualan=:JumlahPenjualan, HargaJual=:HargaJual, IdPengguna=:IdPengguna, TanggalPenjualan=:TanggalPenjualan, IdBarang=:IdBarang WHERE IdPenjualan=:IdPenjualan";
		$this->db->query($query);
		$this->db->bind('IdPenjualan',$data['IdPenjualan']);
		$this->db->bind('JumlahPenjualan',$data['JumlahPenjualan']);
        $this->db->bind('HargaJual',$data['HargaJual']);
        $this->db->bind('IdPengguna',$data['IdPengguna']);
        $this->db->bind('TanggalPenjualan',$data['TanggalPenjualan']);
		$this->db->bind('IdBarang',$data['IdBarang']);

		$this->db->execute();

		return $this->db->rowCount();
	}

	public function deletePenjualan($id)
	{
		$this->db->query('DELETE FROM ' . $this->table . ' WHERE IdPenjualan=:IdPenjualan');
		$this->db->bind('IdPenjualan',$id);
		$this->db->execute();

		return $this->db->rowCount();
	}
}
