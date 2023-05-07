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
              <form role="form" action="<?= base_url; ?>/penjualan/updatePenjualan" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="IdPenjualan" value="<?= $data['penjualan']['IdPenjualan']; ?>">
                <div class="card-body">
                  <div class="form-group">
                    <label >Jumlah Penjualan</label>
                    <input type="number" class="form-control" placeholder="masukkan jumlah penjualan" name="JumlahPenjualan" value="<?= $data['penjualan']['JumlahPenjualan'];?>">
                  </div>
                  <div class="form-group">
                    <label >Harga Jual</label>
                    <input type="number" class="form-control" placeholder="masukkan harga jual" name="HargaJual" value="<?= $data['penjualan']['HargaJual'];?>">
                  </div>
                  <div class="form-group">
                    <label >Tanggal Penjualan</label>
                    <input type="text" class="form-control" placeholder="masukkan tanggal penjualan" name="TanggalPenjualan" value="<?= $data['penjualan']['TanggalPenjualan'];?>">
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