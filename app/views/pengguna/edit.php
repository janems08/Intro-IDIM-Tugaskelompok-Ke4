  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Halaman Pengguna</h1>
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
              <form role="form" action="<?= base_url; ?>/pengguna/updatePengguna" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="IdPengguna" value="<?= $data['pengguna']['IdPengguna']; ?>">
                <div class="card-body">
                  <div class="form-group">
                    <label >Nama Pengguna</label>
                    <input type="text" class="form-control" placeholder="masukkan nama penggunna..." name="NamaPengguna" value="<?= $data['pengguna']['NamaPengguna'];?>">
                  </div>
                  <div class="form-group">
                    <label >Password</label>
                    <input type="password" class="form-control" placeholder="masukkan password..." name="Password" value="<?= $data['pengguna']['Password'];?>">
                  </div>
                  <div class="form-group">
                    <label >Nama Depan</label>
                    <input type="text" class="form-control" placeholder="masukkan Nama Depan..." name="NamaDepan" value="<?= $data['pengguna']['NamaDepan'];?>">
                  </div>
                  <div class="form-group">
                    <label >Nama Belakang</label>
                    <input type="text" class="form-control" placeholder="masukkan Nama Belakang..." name="NamaBelakang" value="<?= $data['pengguna']['NamaBelakang'];?>">
                  </div>
                  <div class="form-group">
                    <label >No HP</label>
                    <input type="text" class="form-control" placeholder="masukkan No HP..." name="NoHP" value="<?= $data['pengguna']['NoHP'];?>">
                  </div>
                  <div class="form-group">
                    <label >Alamat</label>
                    <input type="text" class="form-control" placeholder="masukkan Alamat..." name="Alamat" value="<?= $data['pengguna']['Alamat'];?>">
                  </div>
                  <div class="form-group">
                    <label >Hak Akses</label>
                    <select class="form-control" name="IdAkses">
                        <option value="">Pilih</option>
                         <?php foreach ($data['hakakses'] as $row) :?>
                        <option value="<?= $row['IdAkses']; ?>" <?php if($data['pengguna']['IdAkses'] == $row['IdAkses']) { echo "selected"; } ?>><?= $row['NamaAkses']; ?></option>
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