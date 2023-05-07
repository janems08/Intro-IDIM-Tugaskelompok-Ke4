  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Halaman Hak Akses</h1>
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
              <form role="form" action="<?= base_url; ?>/hakakses/updateHakAkses" method="POST" enctype="multipart/form-data">

                <input type="hidden" name="IdAkses" value="<?= $data['hakakses']['IdAkses']; ?>">
                <div class="card-body">
                  <div class="form-group">
                    <label >Nama Hak Akses</label>
                    <input type="text" class="form-control" placeholder="masukkan nama hak akses..." name="NamaAkses" value="<?= $data['hakakses']['NamaAkses']; ?>">
                  </div>
                  <div class="form-group">
                    <label >Keterangan</label>
                    <input type="text" class="form-control" placeholder="masukkan keterangan hak akses..." name="Keterangan" value="<?= $data['hakakses']['Keterangan']; ?>">
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