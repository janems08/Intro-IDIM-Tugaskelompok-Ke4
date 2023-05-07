  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Halaman Supplier</h1>
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
          <h3 class="card-title"><?= $data['title'] ?></h3> <div class="btn-group float-right"><a href="<?= base_url; ?>/supplier/tambah" class="btn float-right btn-xs btn btn-primary">Tambah Supplier</a>
        </div>
        </div>
        <div class="card-body">

          <table class="table table-bordered">
                  <thead>                  
                    <tr>
                      <th style="width: 10px">#</th>
                      <th>Nama Pemasok</th>
                      <th>Email</th>
                      <th>No HP</th>
                      <th style="width: 150px">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php $no=1; ?> 
                    <?php foreach ($data['supplier'] as $row) :?>
                    <tr>
                      <td><?= $no; ?></td>
                      <td><?= $row['NamaPemasok'];?></td>
                      <td><?= $row['email'];?></td>
                      <td><?= $row['NoHP'];?></div></td>
                      <td>
                        <a href="<?= base_url; ?>/supplier/edit/<?= $row['IdSupplier'] ?>" class="badge badge-info">Edit</a> 
                        <a href="<?= base_url; ?>/supplier/hapus/<?= $row['IdSupplier'] ?>" class="badge badge-danger" onclick="return confirm('Hapus data?');">Hapus</a>
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

