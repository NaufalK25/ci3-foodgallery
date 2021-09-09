<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
?>

<link rel="stylesheet" href="<?= base_url(); ?>assets/css/error_404.css">
<link rel="stylesheet" href="<?= base_url(); ?>assets/css/templates/navbar.css">
<link rel="stylesheet" href="<?= base_url(); ?>assets/css/templates/footer.css">
</head>
<body>

<?php
    $this->load->view('templates/navbar');
?>

<div class="error-kotak">
	<div class="text-center">
		<img src="<?= base_url(); ?>assets/img/person-with-empty-plate.png" alt="No Food" width="375">
		<p class="fs-3">Tidak Ada Makanan Disini!</p>
		<?php if(!$this->session->username): ?>
			<p>
				Kembali ke
				<a href="<?= base_url(); ?>home" class="error-link">Home</a>
			</p>
		<?php else: ?>
			<p>
				Kembali ke?
				<a href="<?= base_url(); ?>home" class="error-link">Home</a> |
				<a href="<?= base_url(); ?>recipe-list/1" class="error-link">Daftar Resep</a>
			</p>
		<?php endif; ?>
	</div>
</div>
