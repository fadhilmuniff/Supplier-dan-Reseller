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
                <div class="col-md-12">
                    <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Pesanan Masuk</a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">Diproses</a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-contact" role="tab" aria-controls="pills-contact" aria-selected="false">Dikirim</a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link" id="pills-contact-tab1" data-toggle="pill" href="#pills-contact1" role="tab" aria-controls="pills-contact" aria-selected="false">Selesai</a>
                        </li>
                    </ul>
                    <div class="tab-content" id="pills-tabContent">
                        <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                            <div class="row">
                                <div class="col-md-12">
                                    <table class="table ">
                                        <thead>
                                            <tr>
                                                <th scope="col">No Order</th>
                                                <th scope="col">Tanggal Order</th>
                                                <th scope="col">Total Bayar</th>
                                                <th scope="col">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $i = 1; ?>
                                            <?php if ($pesanan) : ?>
                                                <?php foreach ($pesanan as $p) : ?>
                                                    <tr class="mt-1">
                                                        <td><?= $p['no_order'] ?></td>
                                                        <td><?= $p['tgl_pesan'] ?></td>
                                                        <td>

                                                            <?= "Rp " . number_format($p['total_bayar'], 0, ',', '.');  ?>,-
                                                            <?php if ($p['status_bayar'] == 0) : ?>
                                                                <span class="badge badge-warning">
                                                                    Belum Bayar</span>
                                                            <?php else : ?>
                                                                <span class="badge badge-success">
                                                                    Sudah Bayar</span>
                                                            <?php endif; ?>
                                                        </td>
                                                        <td>
                                                            <?php if ($p['status_bayar'] == 1) : ?>
                                                                <a href="<?= base_url() ?>supplier/cek_bukti/<?= $p['id_pesanan'] ?> " class="btn btn-success btn-detail">Cek Bukti Bayar</a>
                                                                <a href="<?= base_url() ?>supplier/pesanan_proses/<?= $p['id_pesanan'] ?> " class="btn btn-primary btn-detail">Proses</a>
                                                            <?php endif; ?>


                                                        </td>
                                                    </tr>
                                                <?php endforeach; ?>
                                            <?php else : ?>
                                                <tr>
                                                    <td colspan="6" class="ml-auto text-danger"><b>Belum ada pesanan</b></td>
                                                </tr>
                                            <?php endif; ?>
                                            <?php $i; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                            <div class="row">
                                <div class="col-md-12">
                                    <table class="table ">
                                        <thead>
                                            <tr>
                                                <th scope="col">No Order</th>
                                                <th scope="col">Tanggal Order</th>
                                                <th scope="col">Total Bayar</th>
                                                <th scope="col">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $i = 1; ?>
                                            <?php if ($pesanan_diproses) : ?>
                                                <?php foreach ($pesanan_diproses as $p) : ?>
                                                    <tr class="mt-1">
                                                        <td><?= $p['no_order'] ?></td>
                                                        <td><?= $p['tgl_pesan'] ?></td>
                                                        <td>
                                                            <?= "Rp " . number_format($p['total_bayar'], 0, ',', '.');  ?>,-
                                                            <span class="badge badge-success">
                                                                Diproses
                                                            </span>
                                                        </td>
                                                        <td>
                                                            <a href="<?= base_url() ?>supplier/pesanan_kirim/<?= $p['id_pesanan'] ?> " class="btn btn-primary btn-detail">Kirim</a>
                                                        </td>
                                                    </tr>
                                                <?php endforeach; ?>
                                            <?php else : ?>
                                                <tr>
                                                    <td colspan="6" class="ml-auto text-danger"><b>Belum ada pesanan</b></td>
                                                </tr>
                                            <?php endif; ?>
                                            <?php $i; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
                            <div class="row">
                                <div class="col-md-12">
                                    <table class="table ">
                                        <thead>
                                            <tr>
                                                <th scope="col">No Order</th>
                                                <th scope="col">Tanggal Order</th>
                                                <th scope="col">Total Bayar</th>
                                                <!-- <th scope="col">Aksi</th> -->
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $i = 1; ?>
                                            <?php if ($pesanan_dikirim) : ?>
                                                <?php foreach ($pesanan_dikirim as $p) : ?>
                                                    <tr class="mt-1">
                                                        <td><?= $p['no_order'] ?></td>
                                                        <td><?= $p['tgl_pesan'] ?></td>
                                                        <td>
                                                            <?= "Rp " . number_format($p['total_bayar'], 0, ',', '.');  ?>,-
                                                            <span class="badge badge-success">
                                                                Dikirim
                                                            </span>
                                                        </td>
                                                        <td>
                                                            <!-- <a href="<?= base_url() ?>supplier/pesanan_kirim/<?= $p['id_pesanan'] ?> " class="btn btn-primary btn-detail">Selesai</a> -->
                                                        </td>
                                                    </tr>
                                                <?php endforeach; ?>
                                            <?php else : ?>
                                                <tr>
                                                    <td colspan="6" class="ml-auto text-danger"><b>Belum ada pesanan</b></td>
                                                </tr>
                                            <?php endif; ?>
                                            <?php $i; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="pills-contact1" role="tabpanel" aria-labelledby="pills-contact-tab">
                            <div class="row">
                                <div class="col-md-12">
                                    <table class="table ">
                                        <thead>
                                            <tr>
                                                <th scope="col">No Order</th>
                                                <th scope="col">Tanggal Order</th>
                                                <th scope="col">Total Bayar</th>
                                                <!-- <th scope="col">Aksi</th> -->
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $i = 1; ?>
                                            <?php if ($pesanan_diterima) : ?>
                                                <?php foreach ($pesanan_diterima as $p) : ?>
                                                    <tr class="mt-1">
                                                        <td><?= $p['no_order'] ?></td>
                                                        <td><?= $p['tgl_pesan'] ?></td>
                                                        <td>
                                                            <?= "Rp " . number_format($p['total_bayar'], 0, ',', '.');  ?>,-
                                                            <span class="badge badge-success">
                                                                Diterima
                                                            </span>
                                                        </td>

                                                    </tr>
                                                <?php endforeach; ?>
                                            <?php else : ?>
                                                <tr>
                                                    <td colspan="6" class="ml-auto text-danger"><b>Belum ada pesanan</b></td>
                                                </tr>
                                            <?php endif; ?>
                                            <?php $i; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


    </section>


</div>