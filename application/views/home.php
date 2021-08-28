<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
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
        <a href="<?= base_url() ?>/recipe">
            <button class="btn home-jumbotron-button"><i class="fas fa-list-ul"></i> Daftar Resep</button>
        </a>
    </div>
</div>
<!-- End of Jumbotron -->

<!-- Start of Today Recipe -->
<div class="home-today-recipe">
    <div class="row">
        <div class="col">
            <div class="home-today-recipe-tulisan">
                <h1 class="fs-2">Resep Hari Ini -></h1>
                <p class="fs-5">Judul Resep</p>
                <p class="fs-5">
                    Penjelasan Resep
                </p>
            </div>
        </div>
        <div class="col">
            <div class="card home-today-recipe-card">
                <img src="<?= base_url(); ?>assets/img/home-bg.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                    <div class="text-center">
                        <h5 class="card-title">Nama Resep</h5>
                        <p>Waktu Resep</p>
                        <p>Porsi Resep</p>
                        <p>Kesulitan Resep</p>
                    </div>
                    <div class="text-center">
                        <a href="#" class="btn home-today-recipe-button">Cara Masak</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End of Today Recipe -->