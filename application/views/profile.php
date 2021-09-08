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

<div class="profile-kotak">
    <div class="row">
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
                        <td>@<?= $user['username'] ?></td>
                    </tr>
                    <tr>
                        <th scope="row">Akun Dibuat Sejak</th>
                        <td>:</td>
                        <td><?= date('d F Y', $user['date_created']); ?></td>
                    </tr>
                </tbody>
            </table>
            <div class="row text-center mb-2">
                <a href="#profile-simpan" class="btn btn-outline-dark profile-button profile-button">Simpan</a>
            </div>
            <div class="row text-center mb-2">
                <a href="#profile-buat" class="btn btn-outline-dark profile-button profile-button">Pernah Dibuat</a>
            </div>
            <div class="row text-center mb-2">
                <a href="#profile-kuasa" class="btn btn-outline-dark profile-button profile-button">Telah Meguasai</a>
            </div>
            <div class="row text-center">
                <a href="<?= base_url(); ?>logout" class="btn btn-outline-dark profile-button">Keluar</a>
            </div>
        </div>
    </div>
    <div class="row">
        <p class="fs-3 fw-bold mt-5" id="profile-simpan">Simpan</p>
        <hr>
        <?php for($i = 0; $i < count($saved_recipe); $i++): ?>
            <p><?= $saved_recipe_details[$i]->title ?></p>
            <img src="<?= $saved_recipe_details[$i]->thumb ?>" alt="<?= $saved_recipe_details[$i]->title ?>" class="profile-saved-image">
            <a href="<?= base_url(); ?>recipe/<?= $saved_recipe[$i]['recipe_key'] ?>">Detail</a>
        <?php endfor; ?>
    </div>
    <div class="row">
        <p class="fs-3 fw-bold mt-5" id="profile-buat">Pernah Dibuat</p>
        <hr>
        <?php for($i = 0; $i < count($made_recipe); $i++): ?>
            <p><?= $made_recipe_details[$i]->title ?></p>
            <img src="<?= $made_recipe_details[$i]->thumb ?>" alt="<?= $made_recipe_details[$i]->title ?>" class="profile-made-image">
            <a href="<?= base_url(); ?>recipe/<?= $made_recipe[$i]['recipe_key'] ?>">Detail</a>
        <?php endfor; ?>
    </div>
    <div class="row">
        <p class="fs-3 fw-bold mt-5" id="profile-kuasa">Telah Menguasai</p>
        <hr>
        <?php for($i = 0; $i < count($mastered_recipe); $i++): ?>
            <p><?= $mastered_recipe_details[$i]->title ?></p>
            <img src="<?= $mastered_recipe_details[$i]->thumb ?>" alt="<?= $mastered_recipe_details[$i]->title ?>" class="profile-mastered-image">
            <a href="<?= base_url(); ?>recipe/<?= $mastered_recipe[$i]['recipe_key'] ?>">Detail</a>
        <?php endfor; ?>
    </div>
</div>