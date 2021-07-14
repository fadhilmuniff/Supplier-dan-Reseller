<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1><?= $judul ?></h1>

        </div>

        <div class="section-body">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-3">

                            <img width="200" src="<?= base_url(); ?>assets/img/produk/<?= $produk['gambar_produk'] ?>" alt="">
                        </div>
                        <div class="col-md-6">
                            <h3> <?= $produk['nama_produk'] ?></h3>
                            <p><b>Deskripsi Produk :</b> <?= $produk['deskripsi_produk'] ?></p>
                            <p><b>Harga :</b> <?= "Rp " . number_format($produk['harga_produk'], 0, ',', '.');  ?>,-</p>

                            <p><b>Kategori :</b> <?= $produk['kategori_produk'] ?></p>
                            <p><b>Stok :</b> <?= $produk['stok'] ?></p>

                        </div>

                    </div>
                    <a href="<?= base_url() ?>produk" class="btn btn-secondary btn-block mt-3">Back</a>
                </div>

            </div>


        </div>
    </section>
</div>