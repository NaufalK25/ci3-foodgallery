<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
?>

<link rel="stylesheet" href="<?= base_url(); ?>assets/css/detail.css">
<link rel="stylesheet" href="<?= base_url(); ?>assets/css/templates/navbar.css">
<link rel="stylesheet" href="<?= base_url(); ?>assets/css/templates/footer.css">
</head>
<body>

<?php
    $this->load->view('templates/navbar');
?>

<?= $this->session->flashdata('already_saved'); ?>
<?= $this->session->flashdata('already_made'); ?>
<?= $this->session->flashdata('already_mastered'); ?>

             
<div class="detail-kotak">
    <p class="detail-judul"><?= $recipe_detail->title; ?></p>
    <div class="row detail-row-1">
        <div class="col">
            <div class="mb-3 text-center">
                <img src="<?= $recipe_detail->thumb; ?>" class="detail-gambar" alt="<?= $recipe_detail->title; ?>">
            </div>
        </div>
        <div class="col">
            <table class="table table-hover">
                <thead>
                    <tr class=text-center>
                        <th scope="col">Total</th>
                        <th scope="col">Keterangan</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="text-center">
                        <td class="align-middle"><?= $count_saved; ?></td>
                        <td class="align-middle">Disimpan</td>
                        <td>
                            <form action="<?= base_url(); ?>recipe_controller/post_saved_recipe" method="POST">
                                <input type="hidden" name="saved-page" id="saved-page" value="recipe/<?= $this->uri->segment(2, 0) ?>">
                                <input type="hidden" name="saved-username" id="saved-username" value="<?= $this->session->username; ?>">
                                <input type="hidden" name="saved-key" id="saved-key" value="<?= $this->uri->segment(2, 0); ?>">
                                <input type="hidden" name="saved-title" id="saved-title" value="<?= $recipe_detail->title; ?>">
                                <button type="submit" class="btn btn-outline-dark detail-table-button">Simpan</button>
                            </form>
                        </td>
                    </tr>
                    <tr class="text-center">
                        <td class="align-middle"><?= $count_made; ?></td>
                        <td class="align-middle">Dibuat</td>
                        <td>
                            <form action="<?= base_url(); ?>recipe_controller/post_made_recipe" method="POST">
                                <input type="hidden" name="made-page" id="made-page" value="recipe/<?= $this->uri->segment(2, 0) ?>">
                                <input type="hidden" name="made-username" id="made-username" value="<?= $this->session->username; ?>">
                                <input type="hidden" name="made-key" id="made-key" value="<?= $this->uri->segment(2, 0); ?>">
                                <input type="hidden" name="made-title" id="made-title" value="<?= $recipe_detail->title; ?>">
                                <button type="submit" class="btn btn-outline-dark detail-table-button">Pernah Membuat</button>
                            </form>
                        </td>
                    </tr>
                    <tr class="text-center">
                        <td class="align-middle"><?= $count_mastered; ?></td>
                        <td class="align-middle">Dikuasai</td>
                        <td>
                            <form action="<?= base_url(); ?>recipe_controller/post_mastered_recipe" method="POST">
                                <input type="hidden" name="mastered-page" id="mastered-page" value="recipe/<?= $this->uri->segment(2, 0) ?>">
                                <input type="hidden" name="mastered-username" id="mastered-username" value="<?= $this->session->username; ?>">
                                <input type="hidden" name="mastered-key" id="mastered-key" value="<?= $this->uri->segment(2, 0); ?>">
                                <input type="hidden" name="mastered-title" id="mastered-title" value="<?= $recipe_detail->title; ?>">
                                <button type="submit" class="btn btn-outline-dark detail-table-button">Telah Menguasai</button>
                            </form>
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="detail-bawah-table">
                <p>Note:</p>
                <p>*Simpan untuk membuat shortcut ke resep dari halaman akun</p>
                <p>*Pernah Membuat untuk menampilkan apa saya yang pernah anda buat di halaman akun</p>
                <p>*Telah Menguasai untuk menampilkan apa saya yang telah anda kuasai di halaman akun</p>
            </div>
        </div>
    </div>

    <div class="row detail-detail">
        <div class="col">
            <p class="text-center fs-5 border-end border-dark">
                <i class="fas fa-arrow-up"></i> <?= $recipe_detail->dificulty; ?>
            </p>
        </div>
        <div class="col">
            <p class="text-center fs-5 border-end border-dark">
                <i class="fas fa-clock"></i> <?= $recipe_detail->times; ?>      
            </p>
        </div>
        <div class="col">
            <p class="text-center fs-5">
                <i class="fas fa-utensils"></i> <?= $recipe_detail->servings; ?>
            </p>
        </div>
    </div>
    <div class="row border border-dark position-relative">
        <span>
            <p class="position-absolute fs-3 fw-bold detail-desc-title">
                Deskripsi
            </p>
        </span>
        <div class="p-4">
            <?= $recipe_detail->desc; ?>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-6">
            <p class="fs-3 fw-bold mt-4">Bahan-Bahan Yang Dibutuhkan</p>
            <hr>
            <p class="detail-note">*Checklist bahan jika sudah ada</p>
            <?php $i = 1; ?>
            <?php foreach($recipe_detail->ingredient as $ingredient): ?>
                <p>
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input detail-checkbox" id="remember-me-ing-<?= $i; ?>">
                        <label class="form-check-label" for="remember-me-ing-<?= $i; ?>"><?= $ingredient; ?></label>
                    </div>
                </p>
            <?php $i++; ?>
            <?php endforeach; ?>
        </div>
        <div class="col-lg-6">
        <p class="fs-3 fw-bold mt-4" id="detail-cara">Cara Memasak</p>
        <hr>
        <p class="detail-note">*Checklist cara yang sudah dilakukan</p>
        <?php $i = 1; ?>
        <?php foreach($recipe_detail->step as $step): ?>
            <p>
                <div class="form-check">
                    <input type="checkbox" class="form-check-input detail-checkbox" id="remember-me-step-<?= $i; ?>">
                    <label class="form-check-label" for="remember-me-step-<?= $i; ?>"><?= $step; ?></label>
                </div>
            </p>
        <?php $i++; ?>
        <?php endforeach; ?>
        </div>
    </div>
    <div class="row mt-4">
        <hr>
        <p class="text-center fs-3 fw-bold">Selamat Memasak <i class="far fa-smile"></i> </p>
        <hr>
    </div>
</div>