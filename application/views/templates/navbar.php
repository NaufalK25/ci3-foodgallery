<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
?>

<div class="container navbar-luar">
    <nav class="navbar navbar-expand-lg navbar-light sticky-top">
        <div class="container-fluid">
            <a class="navbar-brand navbar-merek" href="<?= base_url(); ?>home/index">
                <img src="<?= base_url(); ?>assets/img/fg.png" alt="logo" width="30"> FoodGallery
            </a>
            <button class="navbar-toggler navbar-hamburger" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link navbar-menu <?= $url == base_url() . 'home/index'? 'navbar-menu-aktif':'' ?>" href="<?= base_url(); ?>home/index">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link navbar-menu <?= $url == base_url() . 'home/register'? 'navbar-menu-aktif':'' ?>" href="<?= base_url(); ?>home/register">Register</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link navbar-menu <?= $url == base_url() . 'home/login'? 'navbar-menu-aktif':'' ?>" href="<?= base_url(); ?>home/login">Login</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</div>