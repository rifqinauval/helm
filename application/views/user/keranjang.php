<div class="container-fluid">
    <h4>Keranjang Belanja</h4>

    <table class="table table-bordered table-striped table-hover">
        <tr>
            <th>No</th>
            <th>Tipe Produk</th>
            <th>Jumlah</th>
            <th>Harga</th>
            <th>Sub Total</th>
        </tr>

        <?php
        $no = 1;
        foreach ($this->cart->contents() as $items) :
        ?>

            <tr>
                <td><?= $no++ ?></td>
                <td><?= $items['name'] ?></td>
                <td><?= $items['qty'] ?></td>
                <td>Rp. <?= $items['price'] ?></td>
                <td><?= $items['subtotal'] ?></td>
            </tr>

        <?php endforeach; ?>
        <tr>
            <td colspan="4"></td>
            <td>Rp. <?= $this->cart->total(); ?></td>
        </tr>
    </table>

</div>