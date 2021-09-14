<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
?>

<link rel="stylesheet" href="<?= base_url(); ?>assets/css/recipe/page.css">
<link rel="stylesheet" href="<?= base_url(); ?>assets/css/templates/navbar.css">
<link rel="stylesheet" href="<?= base_url(); ?>assets/css/templates/footer.css">
</head>
<body>

<?php
    $this->load->view('templates/navbar');
?>

<div class="p-3">
	<!-- Title -->
	<div class="row m-0">
		<p class="fs-1 fw-bold text-center">Daftar Resep</p>
	</div>

	<!-- Start of Recipe List -->
	<div class="row m-0 gy-5 p-3 justify-content-center bg-secondary">
		<?php foreach($recipe_per_page as $recipe): ?>
			<div class="col-lg-4 m-3 p-3 card border-dark text-center page-card">
				<img src="<?= $recipe->thumb; ?>" alt="<?= $recipe->title; ?>" class="card-img-top">
				<div class="card-body">
					<div class="row m-0 h-75 justify-content-center">
						<p class="card-title fw-bold mb-3"><?= $recipe->new_title; ?></p>
						<div class="row m-0 justify-content-center">
							<!-- <?= $recipe->key; ?> -->
							<div class="col-lg-4">
								<i class="fas fa-arrow-up"></i>
								<p><?= $recipe->dificulty; ?></p>
							</div>
							<div class="col-lg-4">
								<i class="fas fa-clock"></i>
								<p><?= $recipe->times; ?></p>
							</div>
							<div class="col-lg-4">
								<i class="fas fa-utensils"></i>
								<p><?= $recipe->portion; ?></p>
							</div>
						</div>
					</div>
					<div class="row m-0 h-25 align-items-end mt-2">
						<a href="<?= base_url(); ?>recipe/detail/<?= $recipe->key ?>" class="btn btn-outline-info page-button">Detail</a>
					</div>
				</div>
			</div>
		<?php endforeach; ?>
	</div>
	<!-- End of Recipe List -->
</div>

<?php
    $page = $this->uri->segment(3, 0);
    $before = $page - 1;
    $after = $page + 1;
?>

<!-- Pagination -->
<nav class="mt-5 page-pagination" aria-label="Page navigation example">
  <ul class="pagination m-0 justify-content-center">
		<?php if($page == 1): ?>
			<li class="page-item"><a class="page-link disabled text-secondary page-button">&laquo;</a></li>
		<?php elseif($page == 2): ?>
			<li class="page-item"><a class="page-link page-button" href="<?= base_url(); ?>recipe/page/<?= $before; ?>">&laquo;</a></li>
			<li class="page-item"><a class="page-link page-button" href="<?= base_url(); ?>recipe/page/<?= $before; ?>"><?= $before; ?></a></li>
		<?php else: ?>
			<li class="page-item"><a class="page-link page-button" href="<?= base_url(); ?>recipe/page/<?= $before; ?>">&laquo;</a></li>
			<li class="page-item"><a class="page-link page-button" href="<?= base_url(); ?>recipe/page/<?= $before - 1; ?>"><?= $before - 1; ?></a></li>
			<li class="page-item"><a class="page-link page-button" href="<?= base_url(); ?>recipe/page/<?= $before; ?>"><?= $before; ?></a></li>
		<?php endif; ?>
		<li class="page-item active"><a class="page-link page-button"><?= $page; ?></a></li>
		<li class="page-item"><a class="page-link page-button" href="<?= base_url(); ?>recipe/page/<?= $after; ?>"><?= $after; ?></a></li>
		<li class="page-item"><a class="page-link page-button" href="<?= base_url(); ?>recipe/page/<?= $after + 1; ?>"><?= $after + 1; ?></a></li>
		<li class="page-item"><a class="page-link page-button" href="<?= base_url(); ?>recipe/page/<?= $after; ?>">&raquo;</a></li>
	</ul>
</nav>
