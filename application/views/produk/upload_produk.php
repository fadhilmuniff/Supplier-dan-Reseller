<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1><?= $judul ?></h1>

        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-md-6">
                    <?= form_open_multipart('produk/upload_produk'); ?>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Nama Produk</label>
                        <input type="text" class="form-control" name="nama_produk">
                        <small id="emailHelp" class="form-text text-danger"><?= form_error('nama_produk') ?></small>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Deskripsi Produk</label>
                        <textarea class="form-control" name="deskripsi_produk" rows="100"></textarea>
                        <small id="emailHelp" class="form-text text-danger"><?= form_error('deskripsi_produk') ?></small>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Harga</label>
                        <input type="number" class="form-control" name="harga_produk">
                        <small id="emailHelp" class="form-text text-danger"><?= form_error('harga_produk') ?></small>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Gambar</label>
                        <input type="file" class="form-control" name="gambar_produk">
                        <small id="emailHelp" class="form-text text-danger"><?= form_error('gambar_produk') ?></small>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Stok</label>
                        <input type="number" class="form-control" name="stok">
                        <small id="emailHelp" class="form-text text-danger"><?= form_error('stok') ?></small>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Kategori Produk</label>
                        <input type="text" class="form-control" name="kategori_produk">
                        <small id="emailHelp" class="form-text text-danger"><?= form_error('kategori_produk') ?></small>
                    </div>
                    <button type="submit" class="btn btn-primary btn-block" name="upload">Submit</button>
                    <?= form_close(); ?>
                </div>

            </div>
        </div>
    </section>
</div>