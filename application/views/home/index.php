<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
?>

<link rel="stylesheet" href="<?= base_url(); ?>assets/css/home/index.css">
<link rel="stylesheet" href="<?= base_url(); ?>assets/css/templates/navbar.css">
<link rel="stylesheet" href="<?= base_url(); ?>assets/css/templates/footer.css">
</head>
<body>

<?php
    $this->load->view('templates/navbar', [
        'url' => $url
    ]);
?>