<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
?>

<link rel="stylesheet" href="<?= base_url(); ?>assets/css/register.css">
<link rel="stylesheet" href="<?= base_url(); ?>assets/css/templates/navbar.css">
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