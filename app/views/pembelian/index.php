  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Halaman Pembelian</h1>
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
          <h3 class="card-title"><?= $data['title'] ?></h3> <div class="btn-group float-right"><a href="<?= base_url; ?>/pembelian/tambah" class="btn float-right btn-xs btn btn-primary">Tambah Pembelian</a>
        </div>
        </div>
        <div class="card-body">

          <table class="table table-bordered">
                  <thead>                  
                    <tr>
                      <th style="width: 10px">#</th>
                      <th>Jumlah Pembelian</th>
                      <th>Harga Beli</th>
                      <th>Nama Pengguna</th>
                      <th>Tanggal Pembelian</th>
                      <th>Nama Barang</th>
                      <th style="width: 150px">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php $no=1; ?> 
                    <?php foreach ($data['pembelian'] as $row) :?>
                    <tr>
                      <td><?= $no; ?></td>
                      <td><?= $row['JumlahPembelian'];?></td>
                      <td><?= $row['HargaBeli'];?></td>
                      <td><?= $row['NamaPengguna'];?></td>
                      <td><?= $row['TanggalPembelian'];?></td>
                      <td><?= $row['NamaBarang'];?></div></td>
                      <td>
                        <a href="<?= base_url; ?>/pembelian/edit/<?= $row['IdPembelian'] ?>" class="badge badge-info">Edit</a> 
                        <a href="<?= base_url; ?>/pembelian/hapus/<?= $row['IdPembelian'] ?>" class="badge badge-danger" onclick="return confirm('Hapus data?');">Hapus</a>
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

