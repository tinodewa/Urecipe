<?= $this->extend('layout/page_layout.php') ?>

<?= $this->section('content') ?>
<div class="container">
    <div class="row">
        <div class="col-12 mx-auto">
            <div class="card border-0 shadow rounded-3 my-5">
                <div class="card-body p-4 p-sm-5">
                    <a href="<?= site_url("/admin") ?> " class="btn btn-danger mb-3">Kembali</a>
                    <h5 class="card-title text-center mb-5 fw-light fs-5">Recipe <?= $show->name; ?></h5>
                    <div class="card-body">
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">ID</label>
                            <input class="form-control" type="text" value="<?= $show->id; ?>" 
                            aria-label="readonly input example" readonly>
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Nama recipe</label>
                            <input class="form-control" type="text" value="<?= $show->name; ?>" 
                            aria-label="readonly input example" readonly>
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Deskripsi</label>
                            <input class="form-control" type="text" value="<?= $show->description; ?>" 
                            aria-label="readonly input example" readonly>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>