<div class="card card-primary">
    <div class="card-header">
        <h4>Register</h4>
    </div>

    <div class="card-body">
        <form method="POST" action="<?= base_url('auth/register') ?>">
            <div class="form-group">
                <label for="nama">Full name</label>
                <input id="" type="text" class="form-control" name="nama" tabindex="1" autofocus value="<?= set_value('nama') ?>">

                <small id="emailHelp" class="form-text text-danger"><?= form_error('nama') ?></small>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input id="" type="text" class="form-control" name="email" tabindex="1" autofocus value="<?= set_value('email') ?>">

                <small id="emailHelp" class="form-text text-danger"><?= form_error('email') ?></small>
            </div>

            <div class="form-group">
                <div class="d-block">
                    <label for="password" class="control-label">Password</label>

                </div>
                <input id="" type="password" class="form-control" name="password1" tabindex="2">
                <small id="emailHelp" class="form-text text-danger"><?= form_error('password1') ?></small>
            </div>
            <div class="form-group">
                <div class="d-block">
                    <label for="password" class="control-label">Confirm Password</label>

                </div>
                <input id="" type="password" class="form-control" name="password2" tabindex="2">
                <small id="emailHelp" class="form-text text-danger"><?= form_error('password2') ?></small>
            </div>
            <div class="form-group">
                <label for="password" class="control-label">Daftar Sebagai </label>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="role" value="3" id="role1">
                            <label class="form-check-label" for="role1">
                                Reseller
                            </label>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="role" id="role2" value="2">
                            <label class="form-check-label" for="role2">
                                Supplier
                            </label>

                        </div>
                    </div>
                </div>

                <!-- <div class="form-check">

                </div> -->
            </div>


            <div class="form-group">
                <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                    Register
                </button>
            </div>
        </form>
        <div class="mt-5 text-muted text-center">
            Do you have an account? <a href="<?= base_url('auth') ?>">Login here</a>
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