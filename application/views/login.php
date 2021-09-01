<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
?>

<link rel="stylesheet" href="<?= base_url(); ?>assets/css/login.css">
<link rel="stylesheet" href="<?= base_url(); ?>assets/css/templates/navbar.css">
</head>
<body>
    
<?php
    $this->load->view('templates/navbar', [
        'url' => $url
    ]);
?>

<div class="login-kotak-luar">
    <div class="login-kotak">
        <form action="post_data" method="POST">
            <div class="text-center mb-3">
                <img src="<?= base_url(); ?>assets/img/fg.png" alt="logo" width="180">
            </div>
            <div class="form-floating mb-3">
                <input type="text" class="form-control login-input" id="username" name="username" placeholder="Username" required autofocus>
                <label for="username"><i class="fas fa-user"></i> Username</label>
            </div>
            <div class="form-floating mb-3">
                <input type="password" class="form-control login-input" id="password" name="password" placeholder="Password" required autocomplete="off">
                <label for="password"><i class="fas fa-key"></i> Password</label>
            </div>
            <div class="form-check mb-3">
                <input type="checkbox" class="form-check-input login-button-kotak" id="remember-me" checked>
                <label class="form-check-label" for="remember-me">Remember Me</label>
            </div>
            <div class="text-center mb-3">
                <button type="submit" class="btn login-button-kotak login-button">Login</button>
            </div>
            <!-- <p>Don't have an account? <a href="<?= base_url(); ?>home/register" class="login-link">Register Here</a></p> -->
            <p>Belum Punya Akun? <a href="<?= base_url(); ?>home/register" class="login-link">Regis Disini</a></p>
        </form>
    </div>
</div>