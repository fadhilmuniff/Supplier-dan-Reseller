<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1><?= $judul ?></h1>
        </div>
        <div class="section-body">
            <!-- <p><?php $keranjang = 'keranjnag : ' . $this->cart->total_items() . ' items' ?> <?php echo $keranjang ?></p> -->

            <!-- <div class="container"> -->
            <div class="row">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-body">
                            <h5>Produk</h5>
                            <div class="table-responsive">
                                <table class="table ">
                                    <thead>
                                        <tr>
                                            <th scope="col">Produk</th>
                                            <th scope="col">Harga</th>
                                            <th scope="col">Kuantitas</th>
                                            <th scope="col">Id Supplier</th>
                                            <th scope="col">Sub total</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <!-- <?php var_dump($this->cart->contents()); ?> -->
                                        <?php foreach ($this->cart->contents() as $items) :
                                            $id_supplier = $this->Produk_model->detailProdukByIdCheckout($items['id']);
                                        ?>
                                            <tr class="mt-1">
                                                <td><?= $items['name'] ?></td>
                                                <!-- <td><?= $items['id_supplier'] ?></td> -->
                                                <td>Rp. <?= number_format($items['price'], 0, ',', '.') ?></td>
                                                <td><?= $items['qty'] ?></td>
                                                <td><?= $id_supplier['id_supplier'] ?></td>
                                                <td>Rp. <?= number_format($items['subtotal'], 0, ',', '.') ?></td>
                                                <td>
                                                    <!-- <a href="<?= base_url('reseller/checkout/') ?><?= $items['id'] ?>,<?= $items['qty'] ?>" class="btn btn-primary" onclick="return confirm('yakin?');">Checkout</a> -->


                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                            <!-- <form class="form-inline"> -->
                            <form action="<?= base_url('pesanan/checkout') ?>" method="POST">
                                <!-- <div class="row">
                                    <div class="col-md-6">
                                        <input type="text" class="form-control  " placeholder="Provinsi" id="inputUsername" name="provinsi">
                                        <small id="emailHelp" class="form-text text-danger"><?= form_error('provinsi') ?></small>
                                    </div>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control mb-2 mr-sm-2" placeholder="Kota" id="inputUsername" name="kota">
                                        <small id="emailHelp" class="form-text text-danger"><?= form_error('kota') ?></small>
                                    </div>

                                </div>


                                <input type="text" class="form-control mb-2 mr-sm-2" placeholder="Alamat" id="inputUsername" name="alamat">
                                <small id="emailHelp" class="form-text text-danger"><?= form_error('alamat') ?></small>
                                <input type="text" class="form-control mb-2 mr-sm-2" placeholder="Nama Penerima" id="inputUsername" name="nama_penerima">
                                <small id="emailHelp" class="form-text text-danger"><?= form_error('nama_penerima') ?>
                                </small>
                                <?php $no_order = date('Ymd') . strtoupper(random_string('alnum', 8)); ?>
                                <input type="hidden" name="no_order" value="<?= $no_order ?>">
                                <input type="hidden" name="id_supplier" value="<?= $id_supplier['id_supplier']; ?>">
                                <input type="hidden" name="total_bayar" value="<?= $this->cart->total() ?>"> -->


                                <!-- <?= $id_supplier['id_supplier']; ?> -->
                                <br>
                                <?php $i = 1; ?>
                                <?php foreach ($this->cart->contents() as $items) : ?>
                                    <?php echo form_hidden('qty' . $i++, $items['qty']); ?>
                                <?php endforeach; ?>
                                <!-- <textarea class="form-control form-control mb-2 mr-sm-2" name="deskripsi_produk" placeholder="Alamat Lengkap" rows="100"></textarea> -->
                                <!-- </form> -->
                        </div>
                    </div>


                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <h5>Checkout Information</h5>

                            <table class="trip-informations mb-2">
                                <tr>
                                    <th style="width: 70%;">
                                        Sub Total
                                    </th>
                                    <td style="width: 60%;" class="text-right">
                                        Rp. <?= number_format($this->cart->total(), 0, ',', '.') ?>
                                    </td>
                                </tr>
                                <!-- <tr>
                                    <th style="width: 50%;">
                                        Additional VISA
                                    </th>
                                    <td style="width: 50%;" class="text-right">
                                        $190,00
                                    </td>
                                </tr>
                                <tr>
                                    <th style="width: 50%;">
                                        Trip Price
                                    </th>
                                    <td style="width: 50%;" class="text-right">
                                        $80,00 / person
                                    </td>
                                </tr>
                                <tr>
                                    <th style="width: 50%;">
                                        Sub Total
                                    </th>
                                    <td style="width: 50%;" class="text-right">
                                        $280,00
                                    </td>
                                </tr>
                                <tr>
                                    <th style="width: 50%;">
                                        Total (+Unique Code)
                                    </th>
                                    <td style="width: 50%;" class="text-right text-total">
                                        <span class="text-grape">$ 280,</span><span class="text-grape">33</span>
                                    </td>
                                </tr> -->
                            </table>
                            <div class="row">
                                <div class="col-md-6">
                                    <input type="text" class="form-control  " placeholder="Provinsi" id="inputUsername" name="provinsi">
                                    <small id="emailHelp" class="form-text text-danger"><?= form_error('provinsi') ?></small>
                                </div>
                                <div class="col-md-6">
                                    <input type="text" class="form-control mb-2 mr-sm-2" placeholder="Kota" id="inputUsername" name="kota">
                                    <small id="emailHelp" class="form-text text-danger"><?= form_error('kota') ?></small>
                                </div>

                            </div>
                            <input type="text" class="form-control mb-2 mr-sm-2" placeholder="Alamat" id="inputUsername" name="alamat">
                            <small id="emailHelp" class="form-text text-danger"><?= form_error('alamat') ?></small>
                            <input type="text" class="form-control mb-2 mr-sm-2" placeholder="Nama Penerima" id="inputUsername" name="nama_penerima">
                            <small id="emailHelp" class="form-text text-danger"><?= form_error('nama_penerima') ?>
                            </small>
                            <?php $no_order = date('Ymd') . strtoupper(random_string('alnum', 8)); ?>
                            <input type="hidden" name="no_order" value="<?= $no_order ?>">
                            <input type="hidden" name="id_supplier" value="<?= $id_supplier['id_supplier']; ?>">
                            <input type="hidden" name="total_bayar" value="<?= $this->cart->total() ?>">
                            <div class="join-container">
                                <button type="submit" class="btn btn-block btn-primary mt-3 py-2">Lanjutkan Checkout</button>
                            </div>
                            </form>
                            <div class="text-center mt-3">
                                <a href="<?= base_url('reseller/tampilSupplier') ?>" class="text-muted">Kembali Belanja</a>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

        </div>
        <!-- </div> -->

    </section>
</div>