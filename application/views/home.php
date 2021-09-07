<?php
    defined('BASEPATH') OR exit('No direct script access allowed');

    // var_dump($today_recipe);
    // var_dump($recipe_detail);
?>

<link rel="stylesheet" href="<?= base_url(); ?>assets/css/home.css">
<link rel="stylesheet" href="<?= base_url(); ?>assets/css/templates/navbar.css">
<link rel="stylesheet" href="<?= base_url(); ?>assets/css/templates/footer.css">
</head>
<body>

<?php
    $this->load->view('templates/navbar');
?>

<svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
    <symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
        <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
    </symbol>
    <symbol id="info-fill" fill="currentColor" viewBox="0 0 16 16">
        <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"/>
    </symbol>
    <symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 16 16">
        <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
    </symbol>
</svg>

<?= $this->session->flashdata('message'); ?>

<!-- Start of Jumbotron -->
<div class="home-jumbotron">
    <div class="home-jumbotron-isi">
        <div class="home-jumbotron-tulisan">
            <p>Masak Apa Hari Ini?</p>
        </div>
        <?php if(!$this->session->username): ?>
            <div class="home-jumbotron-alert mb-3">
                <p>
                    Anda harus 
                    <a class="home-jumbotron-link" href="<?= base_url() ?>login">login</a> 
                    terlebih dahulu untuk mengakses resep!
                </p>
            </div>
        <?php else: ?>
            <form action="" method="GET" class="d-flex justify-content-center mb-3">
                <input class="form-control me-2 home-jumbotron-input" type="search" placeholder="Search" aria-label="Search" autofocus>
                <button type="submit" class="btn btn-outline-dark home-jumbotron-button"><i class="fas fa-search"></i> Search</button>
            </form>
        <?php endif; ?>
        <?php if(!$this->session->username): ?>
            <a href="<?= base_url()?>login" class="btn btn-outline-dark home-jumbotron-button">
        <?php else: ?>
            <a href="<?= base_url(); ?>recipe-list" class="btn btn-outline-dark home-jumbotron-button">
        <?php endif; ?>
            <i class="fas fa-list-ul"></i> Daftar Resep
        </a>
    </div>
</div>
<!-- End of Jumbotron -->

<!-- Start of Today Recipe -->
<div class="home-today">
    <div class="row">
        <div class="col-lg-5 mb-3">
            <h1 class="fs-4">Resep Hari Ini</h1>
            <hr>
            <p class="fs-4 fw-bold"><?= $today_recipe->new_title; ?></p>
            <div class="row">
                <div class="col">
                    <p><i class="fas fa-arrow-up"></i> <?= $today_recipe->dificulty; ?></p>
                </div>
                <div class="col">
                    <p><i class="fas fa-clock"></i> <?= $today_recipe->times; ?></p>
                </div>
                <div class="col">
                    <p><i class="fas fa-utensils"></i> <?= $today_recipe->portion; ?></p>
                </div>
            </div>
            <p class="home-today-desc"><?= $recipe_detail->desc; ?></p>
            <?php if(!$this->session->username): ?>
                <a href="<?= base_url(); ?>login" class="home-today-link">
            <?php else: ?>
                <a href="<?= base_url(); ?>recipe/<?= $today_recipe->key; ?>" class="home-today-link">
            <?php endif; ?>
                Lihat Detail Resep dan Cara Memasak Disini
            </a>
        </div>
        <div class="col-lg-2"></div>
        <div class="col-lg-5">
            <div class="card home-today-card">
                <img src="<?= $today_recipe->thumb ?>" class="card-img-top" alt="<?= $today_recipe->title; ?>">
                <div class="card-body">
                    <div class=row>
                        <div class="col">
                            <h5 class="card-title fw-bold"><?= $today_recipe->new_title; ?></h5>
                            <div class="row">
                                <div class="col">
                                    <p>0 Disimpan</p>
                                    <p>0 Dibuat</p>
                                    <p>0 Dikuasai</p>
                                </div>
                                <div class="col text-end">
                                    <?php if(!$this->session->username): ?>
                                        <a href="<?= base_url(); ?>login" class="btn btn-outline-dark mb-1 home-today-button">Simpan</a>
                                        <a href="<?= base_url(); ?>login" class="btn btn-outline-dark mb-1 home-today-button">Pernah Membuat</a>
                                        <a href="<?= base_url(); ?>login" class="btn btn-outline-dark mb-1 home-today-button">Telah Menguasai</a>
                                    <?php else: ?>
                                        <form action="" method="POST">
                                            <button type="submit" class="btn btn-outline-dark mb-1 home-today-button">Simpan</button>
                                        </form>
                                        <form action="" method="POST">
                                            <button type="submit" class="btn btn-outline-dark mb-1 home-today-button">Pernah Membuat</button>
                                        </form>
                                        <form action="" method="POST">
                                            <button type="submit" class="btn btn-outline-dark mb-1 home-today-button">Telah Menguasai</button>
                                        </form>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="text-center">
                        <?php if(!$this->session->username): ?>
                            <a href="<?= base_url(); ?>login" class="btn btn-outline-dark home-today-button">
                        <?php else: ?>
                            <a href="<?= base_url(); ?>recipe/<?= $today_recipe->key; ?>#detail-cara" class="btn btn-outline-dark home-today-button">
                        <?php endif; ?>
                            <i class="fas fa-utensils"></i> Cara Masak
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End of Today Recipe -->