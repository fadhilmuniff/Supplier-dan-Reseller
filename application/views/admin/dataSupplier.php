<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1><?= $judul ?></h1>

        </div>

        <div class="section-body">
            <div class="row">
                <div class="col">
                    <div class="col-md-12">
                        <table class="table mt-3">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Foto</th>
                                    <th scope="col">Nama Supplier</th>
                                    <th scope="col">Alamat</th>
                                    <th scope="col">No Telepon </th>

                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                <?php if ($supplier) : ?>
                                    <?php foreach ($supplier as $p) : ?>
                                        <tr class="mt-1">
                                            <th scope="row"><?= $i++; ?></th>
                                            <td class="rounded"><img class="rounded-circle" width="70" src="<?= base_url(); ?>assets/img/profile/<?= $p['gambar'] ?>" alt=""></td>
                                            <td><?= $p['nama_supplier'] ?></td>

                                        </tr>
                                    <?php endforeach; ?>
                                <?php else : ?>
                                    <tr>
                                        <td colspan="6" class="ml-auto text-danger"><b>Belum ada produk</b></td>
                                    </tr>
                                <?php endif; ?>
                                <?php $i; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>