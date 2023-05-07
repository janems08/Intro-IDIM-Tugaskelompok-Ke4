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
<div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title"><?= $data['title']; ?></h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" action="<?= base_url; ?>/supplier/simpansupplier" method="POST" enctype="multipart/form-data">
                <div class="card-body">
                  <div class="form-group">
                    <label >Nama Pemasok</label>
                    <input type="text" class="form-control" placeholder="masukkan nama pemasok..." name="NamaPemasok">
                  </div>
                  <div class="form-group">
                    <label >email</label>
                    <input type="email" class="form-control" placeholder="masukkan email..." name="email">
                  </div>
                  <div class="form-group">
                    <label>Pengguna</label>
                    <select class="form-control" name="IdPengguna">
                        <option value="">Pilih</option>
                         <?php foreach ($data['pengguna'] as $row) :?>
                        <option value="<?= $row['IdPengguna']; ?>"><?= $row['NamaPengguna']; ?></option>
                      <?php endforeach; ?>
                    </select>
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>


    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->