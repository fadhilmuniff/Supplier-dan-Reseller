<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1><?= $judul ?></h1>

        </div>
        <div class="section-body">
            <div class="row">
                <div class="col">
                    <section class="section-popular-content  " id="tabel-files">
                        <div class="container ">
                            <div class="section-popular-travel row justify-content-start" id="">
                                <?php foreach ($supplier as $s) : ?>
                                    <div class="col-sm-6 col-md-3 col-lg-3 ">
                                        <div class="shadow bg-white   d-flex flex-column card text-center">
                                            <div class="card text-center">
                                                <img class="card-img-top rounded-circle my-2" src="<?= base_url(); ?>assets/img/profile/<?= $s['gambar'] ?>" width="20" alt="">
                                                <div class="card-body">
                                                    <h5 class="card-title"><?= $s['nama_supplier'] ?></h5>
                                                    <a href="<?= base_url(''); ?>reseller/produkSupplier/<?= $s['id_supplier'] ?>" class="btn btn-primary">Kunjungi Supplier</a>
                                                </div>
                                            </div>

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