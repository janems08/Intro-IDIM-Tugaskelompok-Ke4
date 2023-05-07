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
<div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title"><?= $data['title']; ?></h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" action="<?= base_url; ?>/pelanggan/updatePelanggan" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="IdPelanggan" value="<?= $data['pelanggan']['IdPelanggan']; ?>">
                <div class="card-body">
                  <div class="form-group">
                    <label >Nama Pelanggan</label>
                    <input type="text" class="form-control" placeholder="masukkan Nama Pelanggan..." name="NamaPelanggan" value="<?= $data['pelanggan']['NamaPelanggan'];?>">
                  </div>
                  <div class="form-group">
                    <label >email</label>
                    <input type="email" class="form-control" placeholder="masukkan email..." name="email" value="<?= $data['pelanggan']['email'];?>">
                  </div>
                  <div class="form-group">
                    <label >Tanggal Lahir</label>
                    <input type="text" class="form-control" value="<?php echo date('Y-m-d');$data['pelanggan']['TanggalLahir']; ?>" pattern="\d{4}-\d{2}-\d{2}" placeholder="masukkan tanggal lahir..." name="TanggalLahir">
                  </div>
                  <div class="form-group">
                    <label >Pengguna</label>
                    <select class="form-control" name="IdPengguna">
                        <option value="">Pilih</option>
                         <?php foreach ($data['pengguna'] as $row) :?>
                        <option value="<?= $row['IdPengguna']; ?>" <?php if($data['pelanggan']['IdPengguna'] == $row['IdPengguna']) { echo "selected"; } ?>><?= $row['NamaPengguna']; ?></option>
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