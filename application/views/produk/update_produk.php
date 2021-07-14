<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1><?= $judul ?></h1>

        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-md-6">
                    <form action="" method="POST">
                        <input type="hidden" name="id_produk" value="<?= $produk['id_produk'] ?>">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Nama Produk</label>
                            <input type="text" class="form-control" name="nama_produk" value="<?= $produk['nama_produk'] ?>">
                            <small id="emailHelp" class="form-text text-danger"><?= form_error('nama_produk') ?></small>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Deskripsi Produk</label>
                            <textarea class="form-control" name="deskripsi_produk"><?= $produk['deskripsi_produk'] ?></textarea>
                            <small id="emailHelp" class="form-text text-danger"><?= form_error('deskripsi_produk') ?></small>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">harga_produk</label>
                            <input type="number" class="form-control" name="harga_produk" value="<?= $produk['harga_produk'] ?>">
                            <small id="emailHelp" class="form-text text-danger"><?= form_error('harga_produk') ?></small>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">gambar_produk</label>
                            <input type="text" class="form-control" name="gambar_produk" value="<?= $produk['gambar_produk'] ?>">
                            <small id="emailHelp" class="form-text text-danger"><?= form_error('gambar_produk') ?></small>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">stok</label>
                            <input type="number" class="form-control" name="stok" value="<?= $produk['stok'] ?>">
                            <small id="emailHelp" class="form-text text-danger"><?= form_error('stok') ?></small>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">kategori produk</label>
                            <input type="text" class="form-control" name="kategori_produk" value="<?= $produk['kategori_produk'] ?>">
                            <small id="emailHelp" class="form-text text-danger"><?= form_error('kategori_produk') ?></small>
                        </div>
                        <div class="form-group">
                            <input type="hidden" class="form-control" name="id_supplier" value="<?= $produk['id_supplier'] ?>">
                            <small id="emailHelp" class="form-text text-danger"><?= form_error('id_supplier') ?></small>
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Active</label>
                            <select class="form-control" id="exampleFormControlSelect1" name="active">
                                <?php if ($produk['active'] == '1') : ?>
                                    <option value="1" selected>Aktif</option>
                                    <option value="0">Tidak Aktif</option>
                                <?php else : ?>
                                    <option value="1">Aktif</option>
                                    <option value="0" selected>Tidak Aktif</option>
                                <?php endif; ?>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary btn-block" name="update">Update</button>
                        <a href="<?= base_url() ?>produk" class="btn btn-secondary btn-block ">Back</a>
                    </form>
                </div>
            </div>

        </div>
    </section>
</div>