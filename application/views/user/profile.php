<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
?>

<link rel="stylesheet" href="<?= base_url(); ?>assets/css/user/profile.css">
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
    <div class="row m-0">
        <p class="fs-3 fw-bold mt-5" id="profile-buat">Resep Yang Disimpan</p>
        <hr>
        <div class="row m-0 gy-5 px-0 justify-content-center">
            <?php for($i = 0; $i < count($saved_recipe_details); $i++): ?>
                <div class="col-lg-4 mx-5 p-0 card border-dark text-center profile-card">
                    <img src="<?= $saved_recipe_details[$i]['thumb'] ?>" alt="<?= $saved_recipe_details[$i]['recipe_title'] ?>" class="card-img-top" height="150">
                    <div class="card-body">
                        <div class="row h-50">
                            <p class="card-title fw-bold text-start profile-card-tulisan h-25"><?= $saved_recipe_details[$i]['recipe_title'] ?></p>
                        </div>
                        <div class="row h-50 align-items-end">
                            <div class="col">
                                <a href="<?= base_url(); ?>recipe/detail/<?= $saved_recipe_details[$i]['recipe_key'] ?>" class="btn btn-outline-dark me-2 profile-button">Detail</a>
                            </div>
                            <div class="col">
                                <!-- Saved Recipe Modal Button -->
                                 <button type="button" class="btn btn-outline-danger profile-button-danger" data-bs-toggle="modal" data-bs-target="#savedRecipeModal<?= $i ?>">
                                    Hapus
                                </button>
                                <!-- Start of Saved Recipe Modal -->
                                <div class="modal fade" id="savedRecipeModal<?= $i ?>" tabindex="-1" aria-labelledby="savedRecipeModalLabel<?= $i ?>" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <p class="modal-title" id="savedRecipeModalLabel<?= $i ?>">Resep Yang Disimpan</p>
                                                <button type="button" class="btn-close alert-button" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                Ingin Menghapus <?= $saved_recipe_details[$i]['recipe_title'] ?>?
                                            </div>
                                            <div class="modal-footer">
                                                <form action="<?= base_url(); ?>UserController/post_remove_saved_recipe" method="POST">
                                                    <input type="hidden" name="saved-recipe" id="saved-recipe" value="<?= $saved_recipe_details[$i]['recipe_title'] ?>">
                                                    <button type="submit" class="btn btn-outline-danger profile-button-danger"">Iya</button>
                                                </form>
                                                <button type="button" class="btn btn-outline-dark profile-button" data-bs-dismiss="modal">Tidak</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- End of Saved Recipe Modal -->
                            </div>
                        </div>
                    </div>
                </div>
            <?php endfor; ?>
        </div>
    </div>
    <!-- End of Saved Recipe -->

    <!-- Start of Made Recipe -->
    <div class="row m-0">
        <p class="fs-3 fw-bold mt-5" id="profile-buat">Resep Yang Pernah Dibuat</p>
        <hr>
        <div class="row m-0 gy-5 px-0 justify-content-center">
            <?php for($i = 0; $i < count($made_recipe_details); $i++): ?>
                <div class="col-lg-4 mx-5 p-0 card border-dark text-center profile-card">
                    <img src="<?= $made_recipe_details[$i]['thumb'] ?>" alt="<?= $made_recipe_details[$i]['recipe_title'] ?>" class="card-img-top" height="150">
                    <div class="card-body">
                        <div class="row h-50">
                            <p class="card-title fw-bold text-start profile-card-tulisan h-25"><?= $made_recipe_details[$i]['recipe_title'] ?></p>
                        </div>
                        <div class="row h-50 align-items-end">
                            <div class="col">
                                <a href="<?= base_url(); ?>recipe/detail/<?= $made_recipe_details[$i]['recipe_key'] ?>" class="btn btn-outline-dark me-2 profile-button">Detail</a>
                            </div>
                            <div class="col">
                                <!-- Made Recipe Modal Button -->
                                 <button type="button" class="btn btn-outline-danger profile-button-danger" data-bs-toggle="modal" data-bs-target="#madeRecipeModal<?= $i ?>">
                                    Hapus
                                </button>
                                <!-- Start of Made Recipe Modal -->
                                <div class="modal fade" id="madeRecipeModal<?= $i ?>" tabindex="-1" aria-labelledby="madeRecipeModalLabel<?= $i ?>" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <p class="modal-title" id="madeRecipeModalLabel<?= $i ?>">Resep Yang Pernah Dibuat</p>
                                                <button type="button" class="btn-close alert-button" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                Ingin Menghapus <?= $made_recipe_details[$i]['recipe_title'] ?>?
                                            </div>
                                            <div class="modal-footer">
                                                <form action="<?= base_url(); ?>UserController/post_remove_made_recipe" method="POST">
                                                    <input type="hidden" name="made-recipe" id="made-recipe" value="<?= $made_recipe_details[$i]['recipe_title'] ?>">
                                                    <button type="submit" class="btn btn-outline-danger profile-button-danger"">Iya</button>
                                                </form>
                                                <button type="button" class="btn btn-outline-dark profile-button" data-bs-dismiss="modal">Tidak</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- End of Made Recipe Modal -->
                            </div>
                        </div>
                    </div>
                </div>
            <?php endfor; ?>
        </div>
    </div>
    <!-- End of Made Recipe -->

    <!-- Start of Mastered Recipe -->
    <div class="row m-0">
        <p class="fs-3 fw-bold mt-5" id="profile-buat">Resep Yang Telah Dikuasai</p>
        <hr>
        <div class="row m-0 gy-5 px-0 justify-content-center">
            <?php for($i = 0; $i < count($mastered_recipe_details); $i++): ?>
                <div class="col-lg-4 mx-5 p-0 card border-dark text-center profile-card">
                    <img src="<?= $mastered_recipe_details[$i]['thumb'] ?>" alt="<?= $mastered_recipe_details[$i]['recipe_title'] ?>" class="card-img-top" height="150">
                    <div class="card-body">
                        <div class="row h-50">
                            <p class="card-title fw-bold text-start profile-card-tulisan h-25"><?= $mastered_recipe_details[$i]['recipe_title'] ?></p>
                        </div>
                        <div class="row h-50 align-items-end">
                            <div class="col">
                                <a href="<?= base_url(); ?>recipe/detail/<?= $mastered_recipe_details[$i]['recipe_key'] ?>" class="btn btn-outline-dark me-2 profile-button">Detail</a>
                            </div>
                            <div class="col">
                                <!-- Mastered Recipe Modal Button -->
                                 <button type="button" class="btn btn-outline-danger profile-button-danger" data-bs-toggle="modal" data-bs-target="#masteredRecipeModal<?= $i ?>">
                                    Hapus
                                </button>
                                <!-- Start of Mastered Recipe Modal -->
                                <div class="modal fade" id="masteredRecipeModal<?= $i ?>" tabindex="-1" aria-labelledby="masteredRecipeModalLabel<?= $i ?>" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <p class="modal-title" id="masteredRecipeModalLabel<?= $i ?>">Resep Yang Telah Dikuasai</p>
                                                <button type="button" class="btn-close alert-button" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                Ingin Menghapus <?= $mastered_recipe_details[$i]['recipe_title'] ?>?
                                            </div>
                                            <div class="modal-footer">
                                                <form action="<?= base_url(); ?>UserController/post_remove_mastered_recipe" method="POST">
                                                    <input type="hidden" name="mastered-recipe" id="mastered-recipe" value="<?= $mastered_recipe_details[$i]['recipe_title'] ?>">
                                                    <button type="submit" class="btn btn-outline-danger profile-button-danger"">Iya</button>
                                                </form>
                                                <button type="button" class="btn btn-outline-dark profile-button" data-bs-dismiss="modal">Tidak</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- End of Mastered Recipe Modal -->
                            </div>
                        </div>
                    </div>
                </div>
            <?php endfor; ?>
        </div>
    </div>
    <!-- End of Mastered Recipe -->
</div>