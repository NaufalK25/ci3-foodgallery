<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
?>

<link rel="stylesheet" href="<?= base_url(); ?>assets/css/auth/register.css">
<link rel="stylesheet" href="<?= base_url(); ?>assets/css/templates/navbar.css">
</head>
<body>

<?php
    $this->load->view('templates/navbar');
?>

<div class="register-kotak-luar">
    <div class="register-kotak">
        <form action="<?= base_url() ?>register" method="POST">
            <div class="text-center mb-3">
                <img src="<?= base_url(); ?>assets/img/fg.png" alt="logo" width="180">
            </div>
            <div class="form-floating mb-3">
                <input type="text" class="form-control register-input" id="fullname" name="fullname" placeholder="Fullname" value="<?= set_value('fullname') ?>" autofocus>
                <label for="fullname"><i class="fas fa-user"></i> Fullname</label>
                <?= form_error('fullname', '<small class="register-error">', '</small>') ?>
            </div>
            <div class="form-floating mb-3">
                <input type="text" class="form-control register-input" id="username" name="username" placeholder="Username" value="<?= set_value('username') ?>">
                <label for="username"><i class="fas fa-user"></i> Username</label>
                <?= form_error('username', '<small class="register-error">', '</small>') ?>
            </div>
            <div class="form-floating mb-3">
                <input type="password" class="form-control register-input" id="password1" name="password1" placeholder="Password" autocomplete="off">
                <label for="password"><i class="fas fa-key"></i> Password</label>
                <?= form_error('password1', '<small class="register-error">', '</small>') ?>
            </div>
            <div class="form-floating mb-3">
                <input type="password" class="form-control register-input" id="password2" name="password2" placeholder="Confirm Password" autocomplete="off">
                <label for="password"><i class="fas fa-sync"></i> Confirm Password</label>
                <?= form_error('password2', '<small class="register-error">', '</small>') ?>
            </div>
            <div class="text-center mb-3">
                <button type="submit" class="btn btn-outline-dark register-button">Register</button>
            </div>
            <!-- <p>Already have an account? <a href="<?= base_url(); ?>home/login" class="register-link">Login Here</a></p> -->
            <p>Sudah Punya Akun? <a href="<?= base_url(); ?>login" class="register-link">Login Disini</a></p>
        </form>
    </div>
</div>
<div class="register-kosong"></div>