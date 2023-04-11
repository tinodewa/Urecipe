<?= $this->extend('layout/page_layout.php') ?>

<?= $this->section('content') ?>
<div class="container">
    <div class="row">
        <div class="col-12 mx-auto">
            <div class="card border-0 shadow rounded-3 my-5">
                <div class="card-body p-4 p-sm-5 text-center">
                    <h2>Delete Data</h2>
                    <p>Are you sure?</p>

                    <?= form_open("/admin/delete/" . $delete->id) ?>
                    <a href="<?= site_url('/admin') ?>">Cancel</a>
                    <button class="btn btn-primary ml-2">Yes</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>