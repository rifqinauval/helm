<!-- <div class="container">
    <div class="row mt-3">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    Detail Data Produk
                </div>
                <div class="card-body">
                    <h5 class="card-title"><?= $produk['merek']; ?></h5>
                    <p class="card-text"><?= $produk['tipe']; ?></p>
                    <p class="card-text"><?= $produk['ukuran']; ?></p>
                    <p class="card-text"><?= $produk['jenis']; ?></p>
                    <p class="card-text"><?= $produk['warna']; ?></p>
                    <p class="card-text"><?= $produk['harga']; ?></p>
                    <a href="<?= base_url(); ?>produk" class="btn btn-primary">Kembali</a>
                </div>
            </div>
        
        </div>
    </div>
</div> -->

<div class="card mb-3" style="max-width: 540px; text-align: center;">
  <div class="row no-gutters">
    <div class="col-md-4">
      <img class="img-produk" src="<?= base_url('assets/img/produk/') . $produk['gambar']; ?>" style=" height: 10rem;">
    </div>
    <div class="col-md-8">
      <div class="card-body">
        <h5 class="card-title"><?= $produk['merek']; ?></h5>
        
        <p class="card-text"><?= $produk['tipe']; ?></p>
        <p class="card-text"><?= $produk['ukuran']; ?></p>
        <p class="card-text"><?= $produk['jenis']; ?></p>
        <p class="card-text"><?= $produk['warna']; ?></p>
        <p class="card-text"><?= $produk['harga']; ?></p>
        <a href="<?= base_url(); ?>user/data_produk_user" class="btn btn-primary">Kembali</a>
      </div>
    </div>
  </div>
</div>