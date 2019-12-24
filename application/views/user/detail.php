

<div class="card mb-3" style="max-width: 540px; text-align: left; margin-left: 200px;">
  <div class="row no-gutters">
    <div class="col-md-4">
      <img class="img-produk" src="<?= base_url('assets/img/produk/') . $produk['gambar']; ?>" style=" height: 10rem;">
    </div>
    <div class="col-md-20">
      <div class="card-body">
        <h5 class="card-title">Merek : <?= $produk['merek']; ?></h5>
        
        <p class="card-text">Tipe : <?= $produk['tipe']; ?></p>
        <p class="card-text">Ukuran : <?= $produk['ukuran']; ?></p>
        <p class="card-text">Jenis : <?= $produk['jenis']; ?></p>
        <p class="card-text">Warna : <?= $produk['warna']; ?></p>
        <p class="card-text">Harga : <?= $produk['harga']; ?></p>
        <a href="<?= base_url(); ?>user/data_produk_user" class="btn btn-primary">Kembali</a>
      </div>
    </div>
  </div>
</div>