<?= $this->extend('layout/page_layout.php') ?>

<?= $this->section('content') ?>
<div class="container">
    <div class="row">
        <div class="col-12 mx-auto">
            <div class="card border-0 shadow rounded-3 my-5">
                <div class="card-body p-4 p-sm-5">
                    <a href="<?= site_url("/admin") ?> " class="btn btn-danger mb-3">Kembali</a>
                    <h5 class="card-title text-center mb-5 fw-light fs-5">Add Recipe</h5>
                    <?php if (session()->has('errors')) : ?>
                        <ul>
                            <?php foreach (session('errors') as $error) : ?>
                                <li><?= $error ?></li>
                            <?php endforeach; ?>
                        </ul>
                    <?php endif ?>
                    <div class="card-body">
                        <?= form_open('/admin/create') ?>
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Nama Recipe</label>
                            <input class="form-control" type="text" value="" name="add_name">
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Deskripsi</label>
                            <input class="form-control" type="text" value="" name="add_desc">
                        </div>
                        <div class="text-center">
                            <a href="<?= base_url("/admin") ?>">Cancel</a>
                            <button class="btn btn-primary ml-2">Save</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>