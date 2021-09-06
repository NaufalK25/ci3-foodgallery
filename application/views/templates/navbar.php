<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
?>

<div class="navbar-luar">
    <nav class="navbar navbar-expand-lg navbar-light sticky-top">
        <div class="container-fluid">
            <a class="navbar-brand navbar-merek" href="<?= base_url(); ?>home">
                <img src="<?= base_url(); ?>assets/img/fg.png" alt="logo" width="30"> FoodGallery
            </a>
            <button class="navbar-toggler navbar-hamburger" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link navbar-menu <?= $url == base_url() . 'home'? 'navbar-menu-aktif':'' ?>" href="<?= base_url(); ?>home">Home</a>
                    </li>
                    <?php if(!$this->session->username): ?>
                        <!-- Belum Login -->
                        <li class="nav-item">
                            <a class="nav-link navbar-menu <?= $url == base_url() . 'login'? 'navbar-menu-aktif':'' ?>" href="<?= base_url(); ?>login">Login</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link navbar-menu <?= $url == base_url() . 'register'? 'navbar-menu-aktif':'' ?>" href="<?= base_url(); ?>register">Register</a>
                        </li>
                    <?php else: ?>
                        <!-- Sudah Login -->
                        <li class="nav-item">
                            <a class="nav-link navbar-menu <?= $url == base_url() . 'recipe'? 'navbar-menu-aktif':'' ?>" href="<?= base_url(); ?>recipe">Daftar Resep</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link navbar-menu <?= $url == base_url() . 'account'? 'navbar-menu-aktif':'' ?>" href="<?= base_url(); ?>account">Akun</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link navbar-menu" href="<?= base_url(); ?>logout">Keluar</a>
                        </li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </nav>
</div>