<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1><?= $judul ?></h1>

        </div>
        <div class="section-body">
            <div class="row">
                <div class="col">
                    <section class="section-popular-content  py-3" id="tabel-files">
                        <div class="container">
                            <div class="section-popular-travel row justify-content-start" id="">
                                <?php foreach ($produk as $p) : ?>
                                    <?php
                                    $id_produk = $p['id_produk'];
                                    $querySubMenu = "SELECT `p`.`id_produk`, `s`.`nama_supplier`
                                    FROM `produk` `p` JOIN `supplier` `s` 
                                    ON `p`.`id_supplier` = `s`.`id_supplier`
                                    WHERE `p`.`id_produk` = $id_produk";
                                    $subMenu = $this->db->query($querySubMenu)->result_array();
                                    // var_dump($subMenu);
                                    ?>

                                    <div class="col-sm-6 col-md-4 col-lg-4 mt-4">
                                        <div class=" shadow bg-white rounded  d-flex flex-column ">
                                            <div class="view overlay">
                                                <img class="card-img-top " src="<?= base_url(); ?>assets/img/produk/<?= $p['gambar_produk'] ?>" height="250" alt="Card image cap">
                                            </div>
                                            <?php foreach ($subMenu as $s) : ?>
                                                <div class="card-body">
                                                    <p class="card-title font-weight-"><a><?= $p['nama_produk'] ?></a></p>
                                                    <p class="mb-2 "><b>Rp. <?= number_format($p['harga_produk']) ?></b></p>
                                                    <p class="card-text"><i class="fas fa-store mr-1"></i><?= $s['nama_supplier'] ?></p>
                                                    <hr class="my-4">

                                                    <a href="<?= base_url() ?>reseller/beli_sekarang/<?= $p['id_produk'] ?>  " class="btn btn-primary btn-block">Beli Sekarang</a>
                                                    <a href="<?= base_url() ?>reseller/detail_produk/<?= $p['id_produk'] ?>  " class="btn btn-secondary btn-block">

                                                        Detail
                                                    </a>

                                                </div>
                                            <?php endforeach; ?>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>

    </section>
</div>