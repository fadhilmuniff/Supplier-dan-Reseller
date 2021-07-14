<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1><?= $judul ?></h1>

        </div>

        <div class="section-body">
            <?php if ($this->session->flashdata()) : ?>
                <div class="alert alert-success  alert-dismissible fade show" role=" alert">
                    Produk <strong> Berhasil!</strong> <?= $this->session->flashdata('flash_produk'); ?>
                </div>
            <?php endif; ?>

            <div class="row mt-2">
                <div class="col-md-4">
                    <form action="" method="POST">
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" placeholder="Cari Produk" aria-describedby="button-addon2" name="keyword_produk">
                            <div class="input-group-append">
                                <button class="btn btn-outline-primary" type="submit" name="search_produk" id="button-addon2"><i class="fas fa-search"></i></button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-md-8 mr-auto">
                    <a href="<?= base_url(); ?>produk/upload_produk" class="btn btn-primary mt-1">Tambah Produk </a>

                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <table class="table mt-3">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Gambar</th>
                                <th scope="col">Nama Produk</th>
                                <th scope="col">Harga</th>
                                <th scope="col">Stok</th>
                                <th scope="col">Status</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1; ?>
                            <?php if ($produk) : ?>
                                <?php foreach ($produk as $p) : ?>
                                    <tr class="mt-1">
                                        <th scope="row"><?= $i++; ?></th>
                                        <td class="rounded"><img width="70" src="<?= base_url(); ?>assets/img/produk/<?= $p['gambar_produk'] ?>" alt=""></td>
                                        <td><?= $p['nama_produk'] ?></td>
                                        <td><?= "Rp " . number_format($p['harga_produk'], 0, ',', '.');  ?>,-</td>
                                        <td><?= $p['stok'] ?></td>
                                        <td>
                                            <?php if ($p['active'] == 1) : ?>
                                                Aktif
                                            <?php else : ?>
                                                Tidak Aktif
                                            <?php endif; ?>
                                        </td>
                                        <td>
                                            <a href="<?= base_url() ?>produk/detail_produk/<?= $p['id_produk'] ?> " class="btn btn-secondary btn-detail">Detail</a>
                                            <a href="<?= base_url('produk/update_produk/') ?><?= $p['id_produk'] ?> " class="btn btn-primary ">Update</a>
                                            <a href="<?= base_url() ?>produk/delete_produk/<?= $p['id_produk'] ?> " class="btn btn-danger" onclick="return confirm('yakin?');">Delete</a>
                                        </td>
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
    </section>
</div>