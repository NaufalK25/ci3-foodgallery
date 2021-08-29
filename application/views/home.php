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
    $this->load->view('templates/navbar', [
        'url' => $url
    ]);
?>

<!-- Start of Jumbotron -->
<div class="home-jumbotron">
    <div class="home-jumbotron-isi">
        <div class="home-jumbotron-tulisan">
            <p>Masak Apa Hari Ini?</p>
        </div>
        <form action="" method="GET" class="d-flex justify-content-center mb-3">
            <input class="form-control me-2 home-jumbotron-input" type="search" placeholder="Search" aria-label="Search" autofocus>
            <button type="submit" class="btn home-jumbotron-button"><i class="fas fa-search"></i> Search</button>    
        </form>
        <a href="<?= base_url() ?>/recipe" class="btn home-jumbotron-button">
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
            <p class="text-right"><?= $recipe_detail->desc; ?></p>
            <a href="<?= base_url(); ?>recipe/detail?key=<?= $today_recipe->key; ?>" class="home-today-link">
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
                            <p>0 Disukai</p>
                            <p>0 Ditandai</p>
                            <p>0 Dikirim</p>
                        </div>
                        <div class="col home-today-card-icon">
                            <button type="submit"><i class="fal fa-heart"></i></button>
                            <button type="submit"><i class="fal fa-bookmark"></i></button>
                            <button type="submit"><i class="fal fa-paper-plane"></i></button>
                        </div>
                    </div>
                    <div class="text-center">
                        <a href="<?= base_url(); ?>recipe/detail?key=<?= $today_recipe->key; ?>" class="btn home-jumbotron-button">
                            <i class="fas fa-utensils"></i> Cara Masak
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End of Today Recipe -->