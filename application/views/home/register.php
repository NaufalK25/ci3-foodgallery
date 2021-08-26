<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
?>

<link rel="stylesheet" href="<?= base_url(); ?>assets/css/home/register.css">
<link rel="stylesheet" href="<?= base_url(); ?>assets/css/templates/navbar.css">
<link rel="stylesheet" href="<?= base_url(); ?>assets/css/templates/footer.css">
</head>
<body>

<?php
    $this->load->view('templates/navbar', [
        'url' => $url
    ]);
?>

<div class="container register-kotak-luar">
    <div class="register-kotak">
        <form action="" method="POST">
            <div class="text-center mb-3">
                <img src="<?= base_url(); ?>assets/img/fgi.png" alt="logo" width="180">
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
            <p>Already have an account? <a href="<?= base_url(); ?>home/login" class="register-link">Login Here</a></p>
        </form>
    </div>
</div>