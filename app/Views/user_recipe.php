<?= $this->extend('layout/page_layout.php') ?>

<?= $this->section('content') ?>

<?php $session = session()?>

<div class="container">
    <div class="row">
        <div class="col-12 mx-auto">
            <div class="card border-0 shadow rounded-3 my-5">
                <div class="card-body p-4 p-sm-5">
                    <a href="<?= base_url(); ?>/logout" class="btn btn-primary mb-3">Log out</a>
                    <h5 class="card-title text-center mb-5 fw-light fs-5">Recipe</h5>
                    <h5 class="card-subtitle text-center mb-5 fw-light fs-5">Halo 
                        <?= session()->get('username') ?></h5>
                    <table class="table">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Name</th>
                                <th scope="col">Description</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($recipe as $row) : ?>
                                <tr>
                                    <td><?= $row->id; ?></td>
                                    <td><?= $row->name; ?></td>
                                    <td><?= $row->description; ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                    <?= $pager->links() ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>