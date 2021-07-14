<div class="card card-primary">
    <div class="card-header">
        <h4>Login</h4>
    </div>
    <!-- <div class="alert alert-danger  " role="alert">
        Email has not registered
    </div> -->
    <!-- <?php if ($this->session->flashdata()) : ?>
        <?php if ($this->session->flashdata() == 'Email') : ?>
            <div class="alert alert-danger  " role="alert">
                <?= $this->session->flashdata('flash_auth_email'); ?> is not registered!
            </div>
            <?php elseif ($this->session->flashdata() == 'Password') : ?>
                <div class="alert alert-danger  " role="alert">
                    <?= $this->session->flashdata('flash_auth_password'); ?>
            </div>

        <?php else : ?>
            <div class="alert alert-success  " role="alert">
                <?= $this->session->flashdata('flash_auth'); ?>
            </div>
        <?php endif; ?>
    <?php endif; ?> -->


    <div class="card-body">
        <?php if ($this->session->flashdata()) : ?>
            <?= $this->session->flashdata('flash_auth'); ?>
        <?php endif; ?>
        <form method="POST" action="<?= base_url('auth') ?>">
            <!-- <?= $this->session->flashdata('flash_auth'); ?> -->
            <div class="form-group">
                <label for="email">Email</label>
                <input id="" type="text" class="form-control" name="email" autofocus value="<?= set_value('email') ?>">
                <div class="invalid-feedback">
                    Please fill in your email
                </div>
                <small id="emailHelp" class="form-text text-danger"><?= form_error('email') ?></small>
            </div>

            <div class="form-group">
                <div class="d-block">
                    <label for="password" class="control-label">Password</label>
                </div>
                <input id="" type="password" class="form-control" name="password">
                <div class="float-right mt-1 mb-1">
                    <a href="auth-forgot-password.html" class="text-small">
                        Forgot Password?
                    </a>
                </div>
                <div class="invalid-feedback">
                    please fill in your password
                </div>
                <small id="emailHelp" class="form-text text-danger"><?= form_error('password') ?></small>
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                    Login
                </button>
            </div>
        </form>
        <div class="mt-5 text-muted text-center">
            Don't have an account? <a href="<?= base_url('auth/register') ?>">Create One</a>
        </div>


    </div>
</div>
<div class="simple-footer">
    Copyright &copy; Stisla 2018
</div>
</div>
</div>
</div>
</section>
</div>