<!-- Begin Page Content -->
<div class="container-fluid">



  <div class="row">
    <div class="col-lg">
      <?php if (validation_errors()) : ?>
        <div class="alert alert-danger" role="alert">
          <?= validation_errors(); ?>
        </div>
      <?php endif; ?>

      <?= $this->session->flashdata('message'); ?>

      <div class="row mt-3">
        <div class="col md-6">
          <form action="" method="post">
            <div class="input-group mb-2">
              <input type="text" class="form-control" placeholder="Cari Helm.." name="keyword">
              <div class="input-group-append">
                <button class="btn btn-primary" type="submit">Cari...</button>
              </div>
            </div>
          </form>
        </div>
      </div>

      <?php $keranjangs = 'Keranjang Belanja : ' . $this->cart->total_items() . 'items'; ?>

      <?= anchor('user/detail_keranjang', $keranjangs) ?>

      <table class="table table-hover">
        <thead>
          <tr>
            <!-- <th scope="col">#</th> -->
            <th scope="col">Gambar</th>
            <th scope="col">Merek</th>
            <th scope="col">Tipe</th>
            <!-- <th scope="col">Ukuran</th>
            <th scope="col">Jenis</th>
            <th scope="col">Warna</th>
            <th scope="col">Harga</th> -->
          </tr>
        </thead>

        <?php if (empty($produk)) : ?>
          <div class="alert alert-danger" role="alert">
            Helm Tidak Ditemukan...
          </div>
        <?php endif; ?>



        <tbody>
          <?php $i = 1; ?>
          <?php foreach ($produk as $pr) : ?>
            <tr>
              <!-- <th scope="row"><?= $i; ?></th> -->
              <td><img class="img-produk" src="<?= base_url('assets/img/produk/') . $pr['gambar']; ?>" style=" height: 10rem;"></td>
              <td><?= $pr['merek']; ?></td>
              <td><?= $pr['tipe']; ?></td>
              <!-- <td><?= $pr['ukuran']; ?></td>
              <td><?= $pr['jenis']; ?></td>
              <td><?= $pr['warna']; ?></td>
              <td><?= $pr['harga']; ?></td> -->
              <td>
                <a href="<?= base_url(); ?>user/detail/<?= $pr['id']; ?>" class="btn btn-outline-info">detail</a>
                <a href="<?= base_url(); ?>user/tambah_ke_keranjang/<?= $pr['id']; ?>" class="btn btn-sm btn-success">Tambah Ke Keranjang</a>

                <!-- <a href="<?= base_url(); ?>admin/hapus/<?= $pr['id']; ?>" class="badge badge-danger" onclick="return confirm('Apakah anda yakin ingin menghapus produk ini ?')">delete</a> -->
              </td>
            </tr>
            <?php $i++; ?>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
    <?= $this->pagination->create_links(); ?>

  </div>


</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->