  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Halaman Pelanggan</h1>
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
          <h3 class="card-title"><?= $data['title'] ?></h3> <div class="btn-group float-right"><a href="<?= base_url; ?>/pelanggan/tambah" class="btn float-right btn-xs btn btn-primary">Tambah Pelanggan</a>
        </div>
        </div>
        <div class="card-body">

          <table class="table table-bordered">
                  <thead>                  
                    <tr>
                      <th style="width: 10px">#</th>
                      <th>Nama Pelanggan</th>
                      <th>Email</th>
                      <th>Tanggal Lahir</th>
                      <th>No HP</th>
                      <th style="width: 150px">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php $no=1; ?> 
                    <?php foreach ($data['pelanggan'] as $row) :?>
                    <tr>
                      <td><?= $no; ?></td>
                      <td><?= $row['NamaPelanggan'];?></td>
                      <td><?= $row['email'];?></td>
                      <td><?= $row['TanggalLahir'];?></td>
                      <td><?= $row['NoHP'];?></div></td>
                      <td>
                        <a href="<?= base_url; ?>/pelanggan/edit/<?= $row['IdPelanggan'] ?>" class="badge badge-info">Edit</a> 
                        <a href="<?= base_url; ?>/pelanggan/hapus/<?= $row['IdPelanggan'] ?>" class="badge badge-danger" onclick="return confirm('Hapus data?');">Hapus</a>
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

