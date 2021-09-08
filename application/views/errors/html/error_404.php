<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
?>

<link rel="stylesheet" href="<?= BASEURL ?>assets/css/error_404.css">
<link rel="stylesheet" href="<?= BASEURL ?>assets/css/templates/navbar.css">
<link rel="stylesheet" href="<?= BASEURL ?>assets/css/templates/footer.css">
</head>
<body>

<?php
    $this->load->view('templates/navbar');
?>

<div class="d-flex justify-content-center">	
	<div class="error-kotak">
		<img src="<?= BASEURL ?>assets/img/person-with-empty-plate.png" alt="No Food">
		<div class="error-tulisan">
			<p class="fs-3">Tidak Ada Makanan Disini!</p>
			<?php if(!$this->session->username): ?>
				<p>
					Kembali ke
					<a href="<?= BASEURL ?>home" class="error-link">Home</a>
				</p>
			<?php else: ?>
				<p>
					Kembali ke?
					<a href="<?= BASEURL ?>home" class="error-link">Home</a> |
					<a href="<?= BASEURL ?>recipe-list/1" class="error-link">Daftar Resep</a>
				</p>
			<?php endif; ?>
		</div>
	</div>
</div>