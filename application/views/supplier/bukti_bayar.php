<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1><?= $judul ?></h1>

        </div>
        <div class="section-body">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">

                        <h6>Nama Bank : <?= $pesanan['nama_bank'] ?></h6>
                        <h6>No Rekening : <?= $pesanan['no_rek'] ?></h6>
                        <h6>Atas Nama : <?= $pesanan['atas_nama'] ?></h6>
                        <img src="<?= base_url(); ?>assets/img/bukti_bayar/<?= $pesanan['bukti_bayar'] ?>" alt="" width="450">
                        <a href="<?= base_url() ?>/supplier/pesanan_masuk/ " class="mt-2 btn btn-primary btn-block ">Back</a>
                    </div>
                </div>

            </div>
            <?php if ($this->session->flashdata()) : ?>


                <?= $this->session->flashdata('flash_pesanan'); ?>
            <?php endif; ?>
            <div class="row">
            </div>

    </section>


</div>