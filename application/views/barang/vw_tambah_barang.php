<div class="container-fluid">
  <div class="row justify-content-center">
    <div class="col-12">
      <h1 class="page-title"><?php echo $judul; ?></h1>
      <p class="text-muted"></p>
      <div class="row">
        <div class="col-md-12">
          <div class="card shadow mb-4">
            <div class="card-header">
              <strong class="card-title">Form Barang</strong>
            </div>
            <div class="card-body">
              <form action="" method="POST" enctype="multipart/form-data">
                <div class="form-row">
                  <div class="form-group col-md-6">
                    <label for="inputEmail4">Nama Barang</label>
                    <input type="text" name='nama_barang' value="<?= set_value('nama_barang'); ?>" class="form-control" id="nama_barang" placeholder="Nama Barang...">
                    <?= form_error('nama_barang', '<small class="text-danger pl-3">', '</small>'); ?>
                  </div>
                  <div class="form-group col-md-6">
                    <label for="inputPassword4">Jenis Barang</label>
                    <input type="text" name='jenis_barang' value="<?= set_value('jenis_barang'); ?>" class="form-control" id="jenis_barang" placeholder="Jenis Barang...">
                    <?= form_error('jenis_barang', '<small class="text-danger pl-3">', '</small>'); ?>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputAddress">Stok</label>
                  <input type="text" name='stok' value="<?= set_value('stok'); ?>" class="form-control" id="stok" placeholder="Stok Barang...">
                  <?= form_error('stok', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
                <div class="form-group">
                  <label for="inputAddress2">Gambar</label>
                  <div class="custom-file">
                      <input type="file" class="custom-file-input" name="gambar" id="gambar">
                      <label for="gambar" class="custom-file-label">Choose File</label>
                  </div>
                </div>
                <div class="form-row">
                  <div class="form-group col-md-6">
                    <a href="<?= base_url('Barang') ?>" class="btn btn-danger form-control " >Kembali</a>
                  </div>
                  <div class="form-group col-md-6">
                    <button type="submit" name="Tambah" class="btn btn-primary form-control">Tambah</button>
                  </div>
                </div>
              </form>
            </div> <!-- /. card-body -->
          </div> <!-- /. card -->
        </div> <!-- /. col -->
      </div>
    </div>
  </div>
</div>