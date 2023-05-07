  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Halaman Penjualan</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
<div class="row">
    <div class="col-sm-12">
      <?php
        Flasher::Message();
      ?>
    </div>
  </div>
      <!-- Default box -->

      <div class="card">
        <div class="card-header">
          <h3 class="card-title"><?= $data['title'] ?></h3> <a href="<?= base_url; ?>/penjualan/tambah" class="btn float-right btn-xs btn btn-primary">Tambah penjualan</a>
        </div>
        <div class="card-body">
        
     
          <table class="table table-bordered">
                  <thead>                  
                    <tr>
                      <th style="width: 10px">#</th>
                      <th>Jumlah penjualan</th>
                      <th>Harga Jual</th>
                      <th>Nama Pengguna</th>
                      <th>Tanggal Penjualan</th>
                      <th>Nama Barang</th>
                      <th style="width: 150px">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php $no=1; ?> 
                    <?php foreach ($data['penjualan'] as $row) :?>
                    <tr>
                      <td><?= $no; ?></td>
                      <td><?= $row['JumlahPenjualan'];?></td>
                      <td><?= $row['HargaJual'];?></td>
                      <td><?= $row['NamaPengguna'];?></td>
                      <td><?= $row['TanggalPenjualan'];?></td>
                      <td><?= $row['NamaBarang'];?></div></td>
                      <td>
                        <a href="<?= base_url; ?>/penjualan/edit/<?= $row['IdPenjualan'] ?>" class="badge badge-info ">Edit</a> 
                        <a href="<?= base_url; ?>/penjualan/hapus/<?= $row['IdPenjualan'] ?>" class="badge badge-danger" onclick="return confirm('Hapus data?');">Hapus</a>
                      </td>
                    </tr>
                    <?php $no++; endforeach; ?>
                  </tbody>
                </table>
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
          Footer
        </div>
        <!-- /.card-footer-->
      </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

