<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1><?= $judul ?></h1>
        </div>
        <div class="section-body">
            <!-- <p><?php $keranjang = 'keranjnag : ' . $this->cart->total_items() . ' items' ?> <?php echo $keranjang ?></p> -->

            <!-- <div class="container"> -->
            <div class="row">
                <div class="col-md-12">
                    <?php if ($this->cart->contents()) : ?>
                        <table class="table mt-3">
                            <thead>
                                <tr>
                                    <th scope="col">Produk</th>
                                    <th scope="col">Harga</th>
                                    <th scope="col">Kuantitas</th>
                                    <th scope="col">Sub total</th>
                                    <th scope="col">Aksi</th>

                                </tr>
                            </thead>
                            <tbody>
                                <!-- <?php var_dump($this->cart->contents()); ?> -->
                                <?php foreach ($this->cart->contents() as $items) : ?>
                                    <tr class="mt-1">
                                        <td><?= $items['name'] ?></td>
                                        <!-- <td><?= $items['id_supplier'] ?></td> -->
                                        <td>Rp. <?= number_format($items['price'], 0, ',', '.') ?></td>
                                        <td><?= $items['qty'] ?></td>
                                        <td>Rp. <?= number_format($items['subtotal'], 0, ',', '.') ?></td>
                                        <td>
                                            <!-- <a href="<?= base_url('reseller/checkout/') ?><?= $items['id'] ?>,<?= $items['qty'] ?>" class="btn btn-primary" onclick="return confirm('yakin?');">Checkout</a> -->
                                            <a href="<?= base_url() ?> " class="btn btn-outline-danger" onclick="return confirm('yakin?');">Delete</a>

                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                        <div class="alert alert-success" role="alert">
                            Total : <b> Rp. <?= number_format($this->cart->total(), 0, ',', '.') ?> </b>
                        </div>
                        <a href="<?= base_url('reseller/hapus_semua_keranjang') ?> " class="btn btn-danger" onclick="return confirm('yakin?');">Delete All</a>
                        <a href="<?= base_url('pesanan/checkout') ?> " class="btn btn-primary">Checkout</a>
                    <?php else : ?>
                        <p><b>Maaf keranjang anda masih kosong</b></p>
                    <?php endif; ?>

                </div>
            </div>

        </div>
        <!-- </div> -->

    </section>
</div>