<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!-- Start of Navbar -->
<nav class="navbar navbar-expand-lg navbar-light sticky-top navbar-bg">
    <div class="container-fluid">
        <a class="navbar-brand navbar-merek" href="<?= base_url(); ?>home">
            <img src="<?= base_url(); ?>assets/img/fg.png" alt="logo" width="30"> FoodGallery
        </a>
		<div class="text-center">
			<button class="navbar-toggler border-dark alert-button" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
		</div>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link navbar-menu <?= $url == base_url() . 'home'? 'navbar-menu-aktif':'' ?>" href="<?= base_url(); ?>home">Home</a>
                </li>
                <!-- Before Login -->
                <?php if(!$this->session->username): ?>
                    <li class="nav-item">
                        <a class="nav-link navbar-menu <?= $url == base_url() . 'register'? 'navbar-menu-aktif':'' ?>" href="<?= base_url(); ?>register">Register</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link navbar-menu <?= $url == base_url() . 'login'? 'navbar-menu-aktif':'' ?>" href="<?= base_url(); ?>login">Login</a>
                    </li>
                <!-- After Login -->
                <?php else: ?>
                    <li class="nav-item">
                        <a class="nav-link navbar-menu <?= $url == base_url() . 'recipe/page/1'? 'navbar-menu-aktif':'' ?>" href="<?= base_url(); ?>recipe/page/1">Daftar Resep</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link navbar-menu <?= $url == base_url() . 'recipe/search'? 'navbar-menu-aktif':'' ?>" href="<?= base_url(); ?>recipe/search">Cari Resep</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link navbar-menu <?= $url == base_url() . 'profile'? 'navbar-menu-aktif':'' ?>" href="<?= base_url(); ?>profile">Profil</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link navbar-menu" href="<?= base_url(); ?>logout">Keluar</a>
                    </li>
                <?php endif; ?>
            </ul>
        </div>
    </div>
</nav>
<!-- End of Navbar -->

<!-- SVG -->
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
