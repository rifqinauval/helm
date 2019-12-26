<div class="container-fluid">
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-12">
            <div class="btn btn-sm btn-success">
                <?php
                $total_bayar = 0;
                if ($keranjangs = $this->cart->contents()) {
                    foreach ($keranjangs as $byr) {
                        $total_bayar = $total_bayar + $byr['subtotal'];
                    }
                    echo "<h4>Total Belanja Anda : Rp. " . number_format($total_bayar);

                ?>
            </div>

            <h3>Mau Dibayar dan Dikirim Kemana ?</h3>

            <form method="post" action="<?= base_url() ?>user/proses_pembayaran">
                <div class="form-group">
                    <label>Nama Lengkap</label>
                    <input type="text" name="nama" id="name" placeholder="Nama Lengkap" class="form-control">
                </div>
                <div class="form-group">
                    <label>Alamat Lengkap</label>
                    <input type="text" name="alamat" id="adress" placeholder="Alamat Lengkap" class="form-control">
                </div>
                <div class="form-group">
                    <label>No. Telephone</label>
                    <input type="text" name="no_tlp" id="name" placeholder="Masukkan Nomor Telephone" class="form-control">
                </div>
                <div class="form-group">
                    <label>Pilih Pengiriman</label>
                    <select class="form-control">
                        <option>JNE</option>
                        <option>J&T</option>
                        <option>POS Indonesia</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Pilih Metode Pembayaran</label>
                    <select class="form-control">
                        <option>Paypal</option>
                        <option>Akulaku</option>
                        <option>Alfamart</option>
                        <option>Indomaret</option>
                        <option>BRI</option>
                        <option>BCA</option>
                    </select>
                </div>

                <button type="submit" class="btn btn-sm btn-primary mb-2">Klik Disini !</button>
            </form>
        <?php
                } else {
                    echo "<h4>Keranjang Masih Kosong";
                }
        ?>
        </div>
        <div class="col-md-2"></div>
    </div>

</div>