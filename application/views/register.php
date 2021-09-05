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

<div class="register-kotak-luar">
    <div class="register-kotak">
        <form action="" method="POST">
            <div class="text-center mb-3">
                <img src="<?= base_url(); ?>assets/img/fg.png" alt="logo" width="180">
            </div>
            <div class="form-floating mb-3">
                <input type="text" class="form-control register-input" id="username" name="username" placeholder="Username" required autofocus>
                <label for="username"><i class="fas fa-user"></i> Username</label>
            </div>
            <div class="form-floating mb-3">
                <input type="password" class="form-control register-input" id="password" name="password" placeholder="Password" required autocomplete="off">
                <label for="password"><i class="fas fa-key"></i> Password</label>
            </div>
            <div class="form-floating mb-3">
                <input type="password" class="form-control register-input" id="password" name="password" placeholder="Confirm Password" required autocomplete="off">
                <label for="password"><i class="fas fa-key"></i> Confirm Password</label>
            </div>
            <div class="text-center mb-3">
                <button type="submit" class="btn register-button-kotak register-button">Register</button>
            </div>
            <!-- <p>Already have an account? <a href="<?= base_url(); ?>home/login" class="register-link">Login Here</a></p> -->
            <p>Sudah Punya Akun? <a href="<?= base_url(); ?>login" class="register-link">Login Disini</a></p>
        </form>
    </div>
</div>