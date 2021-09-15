<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
?>

<link rel="stylesheet" href="<?= base_url(); ?>assets/css/recipe/home.css">
<link rel="stylesheet" href="<?= base_url(); ?>assets/css/templates/navbar.css">
<link rel="stylesheet" href="<?= base_url(); ?>assets/css/templates/footer.css">
</head>
<body>

<?php
    $this->load->view('templates/navbar');
?>

<?= $this->session->flashdata('alert'); ?>
<?php $this->session->set_flashdata('alert', null); ?>

<!-- Start of Jumbotron -->
<div class="home-jumbotron">
    <div class="home-jumbotron-isi">
        <div class="home-jumbotron-tulisan">
            <p>Mau Masak Apa?</p>
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
            <form action="<?= base_url() ?>RecipeController/get_search_keyword" method="POST" class="d-flex justify-content-center mb-3">
                <input class="form-control border-dark me-2 home-jumbotron-input" type="search" name="search-keyword" placeholder="Cari makanan disini..." aria-label="Search" autofocus>
    			<button type="submit" class="btn btn-outline-success home-jumbotron-button"><i class="fas fa-search"></i> Cari</button>
            </form>
        <?php endif; ?>
        <?php if(!$this->session->username): ?>
            <a href="<?= base_url()?>login" class="btn btn-outline-success home-jumbotron-button">
        <?php else: ?>
            <a href="<?= base_url(); ?>recipe/page/1" class="btn btn-outline-success home-jumbotron-button">
        <?php endif; ?>
            <i class="fas fa-list-ul"></i> Daftar Resep
        </a>
    </div>
</div>
<!-- End of Jumbotron -->

<!-- Start of Today Recipe -->
<div class="home-today">
    <div class="row justify-content-center gx-5">
        <!-- Start of Today Recipe Detail -->
        <div class="col-lg-5 me-lg-5 mb-3">
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
                <a href="<?= base_url(); ?>recipe/detail/<?= $today_recipe->key; ?>" class="home-today-link">
            <?php endif; ?>
                Lihat Detail Resep dan Cara Memasak Disini
            </a>
        </div>
        <!-- End of Today Recipe Detail -->

        <!-- Start of Today Recipe Card -->
        <div class="col-lg-5 ms-lg-5">
            <div class="card border-dark home-today-bg">
                <img src="<?= $today_recipe->thumb ?>" class="card-img-top" alt="<?= $today_recipe->title; ?>">
                <div class="card-body">
                    <div class=row>
                        <div class="col">
                            <h5 class="card-title fw-bold"><?= $today_recipe->new_title; ?></h5>
                            <div class="row">
                                <div class="row">
                                    <div class="col">
                                        <p><?= $count_saved; ?>x Disimpan</p>
                                    </div>
                                    <div class="col text-end">
                                        <?php if(!$this->session->username): ?>
                                            <a href="<?= base_url(); ?>login" class="btn btn-outline-primary mb-1 home-today-button">Simpan</a>
                                        <?php else: ?>
                                            <form action="<?= base_url(); ?>RecipeController/post_saved_recipe" method="POST">
                                                <input type="hidden" name="saved-page" id="saved-page" value="home">
                                                <input type="hidden" name="saved-username" id="saved-username" value="<?= $this->session->username; ?>">
                                                <input type="hidden" name="saved-key" id="saved-key" value="<?= $today_recipe->key; ?>">
                                                <input type="hidden" name="saved-title" id="saved-title" value="<?= $recipe_detail->title; ?>">
                                                <button type="submit" class="btn btn-outline-primary mb-1 home-today-button">Simpan</button>
                                            </form>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <p><?= $count_made; ?>x Pernah Dibuat</p>
                                    </div>
                                    <div class="col text-end">
                                        <?php if(!$this->session->username): ?>
                                            <a href="<?= base_url(); ?>login" class="btn btn-outline-primary mb-1 home-today-button">Pernah Membuat</a>
                                        <?php else: ?>
                                            <form action="<?= base_url(); ?>RecipeController/post_made_recipe" method="POST">
                                                <input type="hidden" name="made-page" id="made-page" value="home">
                                                <input type="hidden" name="made-username" id="made-username" value="<?= $this->session->username; ?>">
                                                <input type="hidden" name="made-key" id="made-key" value="<?= $today_recipe->key; ?>">
                                                <input type="hidden" name="made-title" id="made-title" value="<?= $recipe_detail->title; ?>">
                                                <button type="submit" class="btn btn-outline-primary mb-1 home-today-button">Pernah Membuat</button>
                                            </form>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <p><?= $count_mastered; ?>x Telah Dikuasai</p>
                                    </div>
                                    <div class="col text-end">
                                        <?php if(!$this->session->username): ?>
                                            <a href="<?= base_url(); ?>login" class="btn btn-outline-primary mb-1 home-today-button">Telah Menguasai</a>
                                        <?php else: ?>
                                            <form action="<?= base_url(); ?>RecipeController/post_mastered_recipe" method="POST">
                                                <input type="hidden" name="mastered-page" id="mastered-page" value="home">
                                                <input type="hidden" name="mastered-username" id="mastered-username" value="<?= $this->session->username; ?>">
                                                <input type="hidden" name="mastered-key" id="mastered-key" value="<?= $today_recipe->key; ?>">
                                                <input type="hidden" name="mastered-title" id="mastered-title" value="<?= $recipe_detail->title; ?>">
                                                <button type="submit" class="btn btn-outline-primary mb-1 home-today-button">Telah Menguasai</button>
                                            </form>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="text-center">
                        <?php if(!$this->session->username): ?>
                            <a href="<?= base_url(); ?>login" class="btn btn-outline-info home-today-button">
                        <?php else: ?>
                            <a href="<?= base_url(); ?>recipe/detail/<?= $today_recipe->key; ?>#detail-cara" class="btn btn-outline-info home-today-button">
                        <?php endif; ?>
                            <i class="fas fa-utensils"></i> Cara Masak
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <!-- End of Today Recipe Card -->
    </div>
</div>
<!-- End of Today Recipe -->
