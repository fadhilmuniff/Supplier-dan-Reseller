<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1><?= $judul ?></h1>

        </div>

        <div class="section-body">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-5">

                            <img width="300" src="<?= base_url(); ?>assets/img/produk/<?= $produk['gambar_produk'] ?>" alt="">
                        </div>
                        <div class="col-md-7">
                            <h5> <?= $produk['nama_produk'] ?></h5>
                            <p> <b><?= "Rp " . number_format($produk['harga_produk'], 0, ',', '.');  ?>,-</b></p>
                            <p><b>Deskripsi Produk :</b> <br><?= $produk['deskripsi_produk'] ?></p>
                            <a href="<?= base_url() ?>reseller/tambah_keranjang/<?= $produk['id_produk'] ?>  " class="btn btn-primary btn-block">+Tambah Keranjang</a>
                            <a href="" class="btn btn-secondary btn-block">Beli Sekarang</a>
                        </div>

                    </div>

                </div>

            </div>


        </div>
    </section>
</div>