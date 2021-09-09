<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
?>

<link rel="stylesheet" href="<?= base_url(); ?>assets/css/profile.css">
<link rel="stylesheet" href="<?= base_url(); ?>assets/css/templates/navbar.css">
<link rel="stylesheet" href="<?= base_url(); ?>assets/css/templates/footer.css">
</head>
<body>

<?php
    $this->load->view('templates/navbar');
?>

<?= $this->session->flashdata('remove_saved'); ?>
<?= $this->session->flashdata('remove_made'); ?>
<?= $this->session->flashdata('remove_mastered'); ?>

<div class="profile-kotak">
    <!-- Srart of Profile -->
    <div class="row m-0 justify-content-center">
        <div class="col mb-4 text-center">
            <img src="<?= base_url(); ?>assets/img/profile/<?= $user['image']; ?>" class="profile-image" alt="<?= $user['username']; ?>">
        </div>
        <div class="col">
            <table class="table table-hover mb-3">
                <tbody>
                    <tr>
                        <th scope="row">Nama Lengkap</th>
                        <td>:</td>
                        <td><?= $user['fullname']; ?></td>
                    </tr>
                    <tr>
                        <th scope="row">Username</th>
                        <td>:</td>
                        <td><?= $user['username'] ?></td>
                    </tr>
                    <tr>
                        <th scope="row">Akun Dibuat Sejak</th>
                        <td>:</td>
                        <td><?= date('d F Y', $user['date_created']); ?></td>
                    </tr>
                </tbody>
            </table>
            <a href="#profile-simpan" class="btn btn-outline-dark mb-2 me-2 profile-button">Simpan</a>
            <a href="#profile-buat" class="btn btn-outline-dark mb-2 me-2 profile-button">Pernah Dibuat</a>
            <a href="#profile-kuasa" class="btn btn-outline-dark mb-2 me-2 profile-button">Telah Dikuasai</a>
            <a href="<?= base_url(); ?>logout" class="btn btn-outline-danger mb-2 profile-button-danger">Keluar</a>
        </div>
    </div>
    <!-- End of Profile -->

    <!-- Start of Saved Recipe -->
    <div class="row">
        <p class="fs-3 fw-bold mt-5" id="profile-simpan">Resep Yang Disimpan</p>
        <hr>
        <div class="row m-0 mt-3 gx-5 justify-content-center">
            <?php for($i = 0; $i < count($saved_recipe_details); $i++): ?>
                <div class="col-lg-4 mb-3 text-center">
                    <div class="card border-dark profile-card">
                        <img src="<?= $saved_recipe_details[$i]['thumb'] ?>" alt="<?= $saved_recipe_details[$i]['recipe_title'] ?>" class="card-img-top">
                        <div class="card-body">
                            <p class="card-title fw-bold text-start profile-card-tulisan"><?= $saved_recipe_details[$i]['recipe_title'] ?></p>
                            <div class="row">
                                <div class="col">
                                    <a href="<?= base_url(); ?>recipe/<?= $saved_recipe_details[$i]['recipe_key'] ?>" class="btn btn-outline-dark me-2 profile-button">Detail</a>
                                </div>
                                <div class="col">
                                    <form action="<?= base_url(); ?>User_Controller/post_remove_saved_recipe" method="POST">
                                        <input type="hidden" name="saved-recipe" id="saved-recipe" value="<?= $saved_recipe_details[$i]['recipe_title'] ?>">
                                        <button type="submit" class="btn btn-outline-danger profile-button-danger"">Hapus</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endfor; ?>
        </div>
    </div>
    <!-- End of Saved Recipe -->

    <!-- Start of Made Recipe -->
    <div class="row">
        <p class="fs-3 fw-bold mt-5" id="profile-buat">Resep Yang Pernah Dibuat</p>
        <hr>
        <div class="row m-0 mt-3 gx-5 justify-content-center">
            <?php for($i = 0; $i < count($made_recipe_details); $i++): ?>
                <div class="col-lg-4 mb-3 text-center">
                    <div class="card border-dark profile-card">
                        <img src="<?= $made_recipe_details[$i]['thumb'] ?>" alt="<?= $made_recipe_details[$i]['recipe_title'] ?>" class="card-img-top">
                        <div class="card-body">
                            <p class="card-title fw-bold text-start profile-card-tulisan"><?= $made_recipe_details[$i]['recipe_title'] ?></p>
                            <div class="row">
                                <div class="col">
                                    <a href="<?= base_url(); ?>recipe/<?= $made_recipe_details[$i]['recipe_key'] ?>" class="btn btn-outline-dark me-2 profile-button">Detail</a>
                                </div>
                                <div class="col">
                                    <form action="<?= base_url(); ?>User_Controller/post_remove_made_recipe" method="POST">
                                        <input type="hidden" name="made-recipe" id="made-recipe" value="<?= $made_recipe_details[$i]['recipe_title'] ?>">
                                        <button type="submit" class="btn btn-outline-danger profile-button-danger"">Hapus</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endfor; ?>
        </div>
    </div>
    <!-- End of Made Recipe -->

    <!-- Start of Mastered Recipe -->
    <div class="row">
        <p class="fs-3 fw-bold mt-5" id="profile-kuasa">Resep Yang Telah Dikuasai</p>
        <hr>
        <div class="row m-0 mt-3 gx-5 justify-content-center">
            <?php for($i = 0; $i < count($mastered_recipe_details); $i++): ?>
                <div class="col-lg-4 mb-3 text-center">
                    <div class="card border-dark profile-card">
                        <img src="<?= $mastered_recipe_details[$i]['thumb'] ?>" alt="<?= $mastered_recipe_details[$i]['recipe_title'] ?>" class="card-img-top">
                        <div class="card-body">
                            <p class="card-title fw-bold text-start profile-card-tulisan"><?= $mastered_recipe_details[$i]['recipe_title'] ?></p>
                            <div class="row">
                                <div class="col">
                                    <a href="<?= base_url(); ?>recipe/<?= $mastered_recipe_details[$i]['recipe_key'] ?>" class="btn btn-outline-dark me-2 profile-button">Detail</a>
                                </div>
                                <div class="col">
                                    <form action="<?= base_url(); ?>User_Controller/post_remove_mastered_recipe" method="POST">
                                        <input type="hidden" name="mastered-recipe" id="mastered-recipe" value="<?= $mastered_recipe_details[$i]['recipe_title'] ?>">
                                        <button type="submit" class="btn btn-outline-danger profile-button-danger"">Hapus</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endfor; ?>
        </div>
    </div>
    <!-- End of Mastered Recipe -->
</div>