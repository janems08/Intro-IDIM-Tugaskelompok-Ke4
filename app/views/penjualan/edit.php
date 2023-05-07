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
<div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title"><?= $data['title']; ?></h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" action="<?= base_url; ?>/penjualan/updatepenjualan" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="IdPenjualan" value="<?= $data['penjualan']['IdPenjualan']; ?>">
                <div class="card-body">
                  <div class="form-group">
                    <label >Jumlah Penjualan</label>
                    <input type="number" min = "1" class="form-control" placeholder="masukkan jumlah penjualan..." name="JumlahPenjualan" value="<?= $data['penjualan']['JumlahPenjualan'];?>">
                  </div>
                  <div class="form-group">
                    <label >Harga Jual</label>
                    <input type="number" class="form-control" step="10000" min="0" max="1000000000" placeholder="masukkan Harga Jual..." name="HargaJual" value="<?= $data['penjualan']['HargaJual'];?>">
                  </div>
                  <div class="form-group">
                    <label >Pengguna</label>
                    <select class="form-control" name="IdPengguna">
                        <option value="">Pilih</option>
                         <?php foreach ($data['pengguna'] as $row) :?>
                        <option value="<?= $row['IdPengguna']; ?>" <?php if($data['penjualan']['IdPengguna'] == $row['IdPengguna']) { echo "selected"; } ?>><?= $row['NamaPengguna']; ?></option>
                      <?php endforeach; ?>
                    </select>
                  </div>
                  <div class="form-group">
                    <label >Tanggal Penjualan</label>
                    <input type="text" class="form-control" value="<?php echo date('Y-m-d');$data['penjualan']['TanggalPenjualan']; ?>" pattern="\d{4}-\d{2}-\d{2}" placeholder="masukkan tanggal penjualan..." name="TanggalPenjualan">
                  </div>
                  <div class="form-group">
                    <label >Nama Barang</label>
                    <select class="form-control" name="IdBarang">
                        <option value="">Pilih</option>
                         <?php foreach ($data['barang'] as $row) :?>
                        <option value="<?= $row['IdBarang']; ?>" <?php if($data['penjualan']['IdBarang'] == $row['IdBarang']) { echo "selected"; } ?>><?= $row['NamaBarang']; ?></option>
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