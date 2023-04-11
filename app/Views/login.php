<?= $this->extend('layout/nonavbar_page_layout.php') ?>

<?= $this->section('content') ?>

<?php $session = session()?>

<div class="container">
    <div class="row">
        <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
            <div class="card border-0 shadow rounded-3 my-5">
                <div class="card-body p-4 p-sm-5">
                    <h5 class="card-title text-center mb-5 fw-light fs-5">Login</h5>
                    <?php if (!empty(session()->getFlashdata('error'))) : ?>
                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                            <?php echo session()->getFlashdata('error'); ?>
                        </div>
                    <?php endif; ?>
                    <form method="post" action="<?= base_url(); ?>/login/process">
                        <?= csrf_field(); ?>
                        <div class="form-group">
                            <label for="email">Email address</label>
                            <input name="email" type="email" class="form-control" id="email" 
                            aria-describedby="email">
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input name="password" type="password" class="form-control" id="password">
                        </div>
                        <button type="submit" class="btn btn-primary w-100">Login</button>
                        <div class="d-flex flex-row mt-3 justify-content-center">
                            <div class="mr-2">Don't have a account?</div><a 
                            href="<?= base_url(); ?>/register">Register now!</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>