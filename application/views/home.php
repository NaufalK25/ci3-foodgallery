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
            <a href="<?= base_url(); ?>recipe" class="btn btn-outline-dark home-jumbotron-button">
        <?php endif; ?>
            <i class="fas fa-list-ul"></i> Daftar Resep
        </a>
    </div>
</div>
<!-- End of Jumbotron -->

<!-- Start of Today Recipe -->
<div class="home-today">
    <div class="row">
        <div class="col">
            <!-- <div> -->
            <h1 class="fs-4">Resep Hari Ini</h1>
            <hr>
            <p class="fs-4 fw-bold"><?= $today_recipe->new_title; ?></p>
            <p>
                Waktu: <?= $today_recipe->times; ?> |
                Porsi: <?= $today_recipe->portion; ?> |
                Kesulitan: <?= $today_recipe->dificulty; ?>
            </p>
            <p class="home-today-desc"><?= $recipe_detail->desc; ?></p>
            <?php if(!$this->session->username): ?>
                <a href="<?= base_url(); ?>login" class="home-today-link">
            <?php else: ?>
                <a href="<?= base_url(); ?>recipe/detail/<?= $today_recipe->key; ?>" class="home-today-link">
            <?php endif; ?>
                Lihat Detail Resep dan Cara Memasak Disini
            </a>
            <!-- </div> -->
        </div>
        <div class="col">
            <div class="card home-today-card">
                <img src="<?= $today_recipe->thumb ?>" class="card-img-top" alt="<?= $today_recipe->new_title; ?>">
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
                                    <form action="" method="POST">
                                        <button type="submit" class="btn btn-outline-dark mb-1 home-today-button">Simpan</button>
                                    </form>
                                    <form action="" method="POST">
                                        <button type="submit" class="btn btn-outline-dark mb-1 home-today-button">Pernah Membuat</button>
                                    </form>
                                    <form action="" method="POST">
                                        <button type="submit" class="btn btn-outline-dark mb-1 home-today-button">Telah Menguasai</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="text-center">
                        <?php if(!$this->session->username): ?>
                            <a href="<?= base_url(); ?>login" class="btn btn-outline-dark home-today-button">
                        <?php else: ?>
                            <a href="<?= base_url(); ?>recipe/detail/<?= $today_recipe->key; ?>#detail-cara" class="btn btn-outline-dark home-today-button">
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