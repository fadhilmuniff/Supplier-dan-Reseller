<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1><?= $judul ?></h1>
        </div>
        <div class="section-body">
            <?php if ($this->session->flashdata()) : ?>
                <?= $this->session->flashdata('flash_pesanan'); ?>
            <?php endif; ?>
            <div class="row">
                <div class="col-md-3">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h4>No Rekening Supplier</h4>
                        </div>
                        <div class="card-body">
                            <p>Total Bayar :
                            <h3> <?= "Rp " . number_format($detail_pesanan['total_bayar'], 0, ',', '.');  ?>,-</h3>
                            </p>
                            <p>Bank : BNI</p>
                            <p>No Rekening : 7890987</p>
                            <p>Atas Nama : Chiao</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h4>Upload Bukti Pembayaran</h4>

                        </div>
                        <div class="card-body">
                            <?= $detail_pesanan['id_pesanan']; ?>
                            <?php echo form_open_multipart('pesanan_saya/bayar/' .  $detail_pesanan['id_pesanan']); ?>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Atas Nama</label>
                                <input type="text" class="form-control" name="atas_nama">
                                <input type="hidden" class="form-control" name="id_pesanan" value=" <?= $detail_pesanan['id_pesanan']; ?>">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Nama Bank</label>
                                <input type="text" class="form-control" name="nama_bank">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">No Rekening</label>
                                <input type="text" class="form-control" name="no_rek">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Upload Bukti Pembayaran</label>
                                <input type="file" name="bukti_bayar" class="form-control" required>
                            </div>
                            <button type="submit" class="btn btn-block btn-primary">Upload</button>
                            <a href="<?= base_url('pesanan_saya') ?>" class="btn btn-block btn-light">Batal</a>
                            <!-- </form> -->
                            <?php echo form_close(); ?>
                        </div>
                    </div>
                </div>
                <div class="col-md-3"></div>

            </div>
        </div>

    </section>
</div>