
--
-- Database: `buku_kita`
--
CREATE DATABASE introIDIM_TugasKelompok4;

use introIDIM_TugasKelompok4;

--
-- Struktur dari tabel `Hak Akses`
--
CREATE TABLE HakAkses (
    IdAkses int primary key not null AUTO_INCREMENT,
    NamaAkses varchar(50) not null,
    Keterangan varchar(100) not null
);

--
-- Struktur dari tabel `pengguna`
--

CREATE TABLE pengguna (
  IdPengguna int(11) primary key NOT NULL AUTO_INCREMENT,
  NamaPengguna varchar(100) NOT NULL,
  Password varchar(8) NOT NULL,
  NamaDepan varchar(50) NOT NULL,
  NamaBelakang varchar(30) NOT NULL,
  NoHP varchar(12) NOT NULL,
  Alamat varchar(100) NOT NULL,
  IdAkses int 
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

ALTER TABLE pengguna
ADD CONSTRAINT fk_idakses_to_penggunna
FOREIGN KEY (IdAkses)
REFERENCES HakAkses(IdAkses);

--
-- Struktur dari tabel `barang`
--
CREATE TABLE `barang` (
  `IdBarang` int(11) primary key NOT NULL AUTO_INCREMENT,
  `NamaBarang` varchar(100) NOT NULL,
  `Keterangan` varchar(100) NOT NULL,
  `Satuan` int(11) NOT NULL,
  `IdPengguna` int 
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

ALTER TABLE barang
ADD CONSTRAINT fk_idpengguna_to_barang
FOREIGN KEY (IdPengguna)
REFERENCES pengguna(IdPengguna);

--
-- Struktur dari tabel `pembelian`
--

CREATE TABLE `pembelian` (
  `IdPembelian` int(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
  `JumlahPembelian` int(11) NOT NULL,
  `HargaBeli` double NOT NULL,
  `IdPengguna` int(11),
  `TanggalPembelian` date NOT NULL,
  `IdBarang` int(11) 
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

ALTER TABLE pembelian
ADD CONSTRAINT fk_idpengguna_to_pembelian
FOREIGN KEY (IdPengguna)
REFERENCES pengguna(IdPengguna);

ALTER TABLE pembelian
ADD CONSTRAINT fk_idbarang_to_pembelian
FOREIGN KEY (IdBarang)
REFERENCES barang(IdBarang);

--
-- Struktur dari tabel `penjualan`
--

CREATE TABLE `penjualan` (
  `IdPenjualan` int(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
  `JumlahPenjualan` int(11) NOT NULL,
  `HargaJual` double NOT NULL,
  `IdPengguna` int(11),
  `TanggalPenjualan` date NOT NULL,
  `IdBarang` int(11)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

ALTER TABLE penjualan
ADD CONSTRAINT fk_idpengguna_to_penjualan
FOREIGN KEY (IdPengguna)
REFERENCES pengguna(IdPengguna);

ALTER TABLE penjualan
ADD CONSTRAINT fk_idbarang_to_penjualan
FOREIGN KEY (IdBarang)
REFERENCES barang(IdBarang);

--
-- Struktur dari tabel `supplier`
--

CREATE TABLE `supplier` (
  `IdSupplier` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `NamaPemasok` varchar(100) NOT NULL,
  `email` varchar(20) NOT NULL,
  `IdPengguna` int(11)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

ALTER TABLE supplier
ADD CONSTRAINT fk_idpengguna_to_supplier
FOREIGN KEY (IdPengguna)
REFERENCES pengguna(IdPengguna);

--
-- Struktur dari tabel `pelanggan`
--

CREATE TABLE `pelanggan` (
  `IdPelanggan` int(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
  `NamaPelanggan` varchar(100) NOT NULL,
  `email` varchar(20) NOT NULL,
  `TanggalLahir` date NOT NULL,
  `IdPengguna` int(11)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

ALTER TABLE pelanggan
ADD CONSTRAINT fk_idpengguna_to_pelanggan
FOREIGN KEY (IdPengguna)
REFERENCES pengguna(IdPengguna);


INSERT INTO HakAkses (IdAkses, NamaAkses, Keterangan) 
VALUES 
(1, 'Administrator', 'Superuser dengan hak akses penuh'),
(2, 'Manager', 'Mengelola data dan transaksi');
(3, 'Supplier', 'supplier barang'),
(4, 'Pelanggan', 'pelanggan yang setia');

INSERT INTO Pengguna (IdPengguna, NamaPengguna, Password, NamaDepan, NamaBelakang, NoHP, Alamat, IdAkses) VALUES
(1, 'admin', 'admin123', 'John', 'Doe', '08123456789', 'Jl A no 1', 1),
(2, 'manager', 'manager1', 'Sarah', 'Smith', '08123411789', 'Jl B no 1', 2);
(3, 'surya', 'surya123', 'surya', 'Rakindo', '08123426789', 'Jl C no 1', 3),
(4, 'Adorra', 'Adorra12', 'Adorra', 'Jaya', '08123411289', 'Jl D no 1', 3);
(5, 'Kim', 'Tyung123', 'Kim', 'Taehyung', '08123452789', 'Jl E no 1', 4),
(6, 'Jeon', 'Jk12345’', 'Jeon', 'Jungkook’', '08122431789', 'Jl F no 1', 4);

INSERT INTO Barang (IdBarang, NamaBarang, Keterangan, Satuan, IdPengguna)
VALUES (1, 'Laptop ASUS ROG', 'Laptop gaming terbaru dengan spesifikasi tinggi', 1, 1),
       (2, 'Samsung Galaxy S21', 'Smartphone dengan kamera terbaik', 1, 1),
       (3, 'Apple iPad Pro', 'Tablet dengan layar Retina dan Apple Pencil support', 1, 1);

INSERT INTO supplier (IdSupplier, NamaPemasok, email,IdPengguna)
VALUES
(1, 'Surya Rakindo','surya@gmail.com', 3),
(2, 'CV. Adorra Jaya Mandiri','adoraa@gmail.com',3);

INSERT INTO pelanggan (IdPelanggan, NamaPelanggan,email,TanggalLahir,IdPengguna) VALUES
(1, 'Kim Taehyung','kim@gmail.com','1995-12-30',4),
(2, 'Jeon Jungkook','jungkook@gmail.com','1997-09-01',4);

INSERT INTO pembelian (IdPembelian, IdBarang, JumlahPembelian, HargaBeli, IdPengguna, TanggalPembelian)
VALUES
(1, 1, 5, 15000000, 3, '2023-04-16'),
(2, 2, 3, 11000000, 3, '2023-04-16');

INSERT INTO penjualan (IdPenjualan, IdBarang, JumlahPenjualan, HargaJual, IdPengguna, TanggalPenjualan)
VALUES
  (1, 1, 3, 16000000, 4, '2023-04-16'),
  (2, 2, 1, 9000000, 4, '2023-04-16');

INSERT INTO penjualan (IdPenjualan, IdBarang, JumlahPenjualan, HargaJual, IdPengguna, TanggalPenjualan)
VALUES
  (4, 1, 3, 16000000, 5, '2023-04-16'),
  (5, 3, 2, 9000000, 5, '2023-04-16'),
  (6, 5, 1, 6000000, 6, '2023-04-16'),
  (7, 7, 4, 2000000, 6, '2023-04-16'),
  (8, 2, 1, 12000000, 5, '2023-04-17'),
  (9, 4, 3, 15000000, 5, '2023-04-17'),
  (10, 6, 2, 10000000, 6, '2023-04-17'),
  (11, 8, 1, 12000000, 6, '2023-04-17'),
  (12, 10, 5, 9500000, 5, '2023-04-18'),
  (13, 3, 4, 8500000, 5, '2023-04-18'),
  (14, 1, 2, 17000000, 6, '2023-04-18'),
  (15, 5, 3, 5500000, 6, '2023-04-18'),
  (16, 7, 1, 1900000, 5, '2023-04-19'),
  (17, 2, 2, 11500000, 5, '2023-04-19'),
  (18, 4, 1, 14000000, 6, '2023-04-19'),
  (19, 6, 4, 8500000, 6, '2023-04-19'),
  (20, 8, 2, 13000000, 5, '2023-04-20'),
  (21, 10, 3, 9000000, 5, '2023-04-20'),
  (22, 1, 1, 16500000, 6, '2023-04-20'),
  (23, 3, 2, 8500000, 6, '2023-04-20');

  INSERT INTO pembelian (IdPembelian, IdBarang, JumlahPembelian, HargaBeli, IdPengguna, TanggalPembelian)
VALUES
(5, 1, 5, 15000000, 3, '2023-04-16'),
(6, 2, 3, 11000000, 3, '2023-04-16'),
(7, 3, 4, 8000000, 4, '2023-04-16'),
(8, 4, 4, 12000000, 3, '2023-04-16'),
(9, 5, 2, 5000000, 4, '2023-04-16'),
(10, 6, 4, 9000000, 4, '2023-04-16'),
(11, 7, 1, 2000000, 4, '2023-04-16'),
(12, 8, 7, 14000000, 3, '2023-04-16'),
(13, 9, 2, 5000000, 3, '2023-04-16'),
(14, 10, 6, 10000000, 4, '2023-04-16'),
(15, 1, 3, 15500000, 4, '2023-04-17'),
(16, 2, 4, 12000000, 3, '2023-04-17'),
(17, 3, 5, 7000000, 4, '2023-04-17'),
(18, 4, 3, 12500000, 3, '2023-04-17'),
(19, 5, 5, 5500000, 4, '2023-04-17'),
(20, 6, 6, 8500000, 3, '2023-04-17'),
(21, 7, 2, 1750000, 3, '2023-04-17'),
(22, 8, 5, 13500000, 4, '2023-04-17'),
(23, 9, 1, 4800000, 3, '2023-04-17'),
(24, 10, 8, 9500000, 4, '2023-04-17');
