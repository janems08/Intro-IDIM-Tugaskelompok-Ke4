<?php
class HomeModel {
    private $db;

    public function __construct(){
		$this->db = new Database;
	}

    public function getAllKeuntungan(){
        $query = "SELECT b.IdBarang, b.NamaBarang, (select sum(pen2.JumlahPenjualan) FROM `penjualan` pen2
                    WHERE pen2.IdBarang=b.IdBarang) AS totalTerjual, ((select sum(pen2.JumlahPenjualan) FROM `penjualan` pen2
                    WHERE pen2.IdBarang=b.IdBarang) *
                    ((round(sum(pen.hargajual)/sum(pen.JumlahPenjualan))) - (round(sum(pem.hargabeli)/sum(pem.JumlahPembelian))))) as Keuntungan
                    FROM `barang` b 
                    INNER join `penjualan` pen
                    ON b.IdBarang = pen.IdBarang
                    INNER join `pembelian` pem
                    ON b.IdBarang = pem.IdBarang
                    GROUP BY pen.IdBarang
                    ORDER BY pen.IdBarang ASC;";

        $this->db->query($query);
		return $this->db->resultSet();
    }
}