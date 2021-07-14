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
                                <th scope="col">Nama Supplier</th>
                                <th scope="col">Aksi</th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1; ?>
                            <?php if ($produk) : ?>
                                <?php foreach ($produk as $p) : ?>
                                    <?php
                                    $id_produk = $p['id_produk'];
                                    $querySubMenu = "SELECT `p`.`id_produk`, `s`.`nama_supplier`
                                    FROM `produk` `p` JOIN `supplier` `s` 
                                    ON `p`.`id_supplier` = `s`.`id_supplier`
                                    WHERE `p`.`id_produk` = $id_produk";
                                    $subMenu = $this->db->query($querySubMenu)->result_array();
                                    ?>
                                    <?php foreach ($subMenu as $s) : ?>
                                        <tr class="mt-1">
                                            <th scope="row"><?= $i++; ?></th>
                                            <td class="rounded"><img width="70" src="<?= base_url(); ?>assets/img/produk/<?= $p['gambar_produk'] ?>" alt=""></td>
                                            <td><?= $p['nama_produk'] ?></td>
                                            <td><?= "Rp " . number_format($p['harga_produk'], 0, ',', '.');  ?>,-</td>
                                            <td><?= $s['nama_supplier'] ?></td>
                                            <td>
                                                <a href="<?= base_url() ?>admin/non_aktif/<?= $p['id_produk'] ?> " class="btn btn-danger" onclick="return confirm('yakin?');">Non Akifkan</a>
                                            </td>
                                        </tr>

                                    <?php endforeach; ?>
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