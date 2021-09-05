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

<div class="detail-kotak-luar">
    <p class="detail-judul"><?= $recipe_detail->title; ?></p>
    <div class="detail-kotak-dalam">
        <div class="row">
            <div class="col detail-kotak-kiri">
                <div class="text-center">
                    <img src="<?= $recipe_detail->thumb; ?>" alt="<?= $recipe_detail->title; ?>" width="300">
                </div>
                <div class="row detail-kotak-kiri-bawah">
                    <div class="col">
                        <p>0 Disimpan</p>
                        <p>0 Dibuat</p>
                        <p>0 Dikuasai</p>
                    </div>
                    <div class="col">
                        <div class="col text-end">
                            <button type="submit" class="btn mb-1 detail-button">Simpan</button>
                            <br>
                            <button type="submit" class="btn mb-1 detail-button">Pernah Membuat</button>
                            <br>
                            <button type="submit" class="btn mb-1 detail-button">Telah Menguasai</button>
                        </div> 
                    </div>
                </div>
                <div class="row detail-kotak-kiri-bawah">
                    <p>Waktu = <?= $recipe_detail->times; ?></p>
                    <p>Porsi = <?= $recipe_detail->servings; ?></p>
                    <p>Kesulitan = <?= $recipe_detail->dificulty; ?></p>
                </div>
            </div>
            <div class="col detail-kotak-kanan">
                <p class="detail-desc">
                    <?= $recipe_detail->desc; ?>
                </p>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="detail-bahan">
                    <p class="detail-mini-judul">Bahan-Bahan Yang Dibutuhkan</p>
                    <hr>
                    <p class="detail-note">*Checklist bahan jika sudah ada</p>
                    <?php foreach($recipe_detail->ingredient as $ingredient): ?>
                        <p>
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input detail-checkbox" id="remember-me">
                                <label class="form-check-label" for="remember-me"><?= $ingredient; ?></label>
                            </div>
                        </p>
                    <?php endforeach; ?>
                </div>
            </div>
            <div class="col">
                <div class="detail-cara" id="detail-cara">
                    <p class="detail-mini-judul">Cara Memasak</p>
                    <hr>
                    <p class="detail-note">*Checklist cara memasak yang sudah dilakukan</p>
                    <?php foreach($recipe_detail->step as $step): ?>
                        <p>
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input detail-checkbox" id="remember-me">
                                <label class="form-check-label" for="remember-me"><?= $step; ?></label>
                            </div>
                        </p>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</div>