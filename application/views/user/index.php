<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1><?= $judul ?></h1>

        </div>

        <div class="section-body">
            <div class="card mb-3">
                <div class="row no-gutters">
                    <div class="col-md-4">
                        <img src="<?= base_url(); ?>assets/img/profile/default.jpg" width="200px">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title"><?= $user['nama'] ?></h5>
                            <p class="card-text"><?= $user['email'] ?>.</p>
                            <p class="card-text"><small class="text-muted">Since <?= date('d M Y', $user['date_created']) ?></small></p>
                            <a href="" class="btn btn-primary">Edit Profile</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>