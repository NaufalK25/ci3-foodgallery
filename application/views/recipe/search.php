<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
?>

<link rel="stylesheet" href="<?= base_url(); ?>assets/css/recipe/search.css">
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
		<p class="fs-1 fw-bold text-center">Cari Resep</p>
	</div>

	<!-- Search Bar -->
	<form action="<?= base_url() ?>RecipeController/get_search_keyword" method="POST">
	    <input class="form-control border-dark mb-3 search-input" type="search" name="search-keyword" placeholder="Cari makanan disini..." aria-label="Search" autofocus>
		<div class="text-center">
			<button type="submit" class="btn btn-outline-success mb-5 search-button"><i class="fas fa-search"></i> Cari</button>
		</div>
	</form>

	<!-- Content -->
	<?php if($keyword && count($recipe_by_keyword) < 1): ?>
		<!-- If recipe not found -->
		<div class="text-center search-no-content">
			<p class="fs-3 fw-bold">Tidak ada makanan bernama <?= $keyword; ?>! <i class="far fa-frown"></i></p>
		</div>
	<?php elseif($keyword): ?>
		<!-- If recipe found -->
		<!-- Start of Search Recipe -->
		<div class="row m-0 gy-5 p-3 justify-content-center bg-secondary">
			<?php foreach($recipe_by_keyword as $recipe): ?>
				<div class="col-lg-4 m-3 p-3 card border-dark text-center search-card">
					<img src="<?= $recipe->thumb; ?>" alt="<?= $recipe->title; ?>" class="card-img-top">
					<div class="card-body">
						<div class="row m-0 h-75 justify-content-center">
							<p class="card-title fw-bold mb-3"><?= $recipe->new_title; ?></p>
							<div class="row m-0 justify-content-center">
								<!-- <?= $recipe->key; ?> -->
								<div class="col-lg-4">
									<i class="fas fa-arrow-up"></i>
									<p><?= $recipe->difficulty; ?></p>
								</div>
								<div class="col-lg-4">
									<i class="fas fa-clock"></i>
									<p><?= $recipe->times; ?></p>
								</div>
								<div class="col-lg-4">
									<i class="fas fa-utensils"></i>
									<p><?= $recipe->serving; ?></p>
								</div>
							</div>
						</div>
						<div class="row m-0 h-25 align-items-end mt-2">
							<a href="<?= base_url(); ?>recipe/detail/<?= $recipe->key ?>" class="btn btn-outline-info search-button">Detail</a>
						</div>
					</div>
				</div>
			<?php endforeach; ?>
		</div>
		<!-- End of Search Recipe -->
	</div>
	<?php else: ?>
		<!-- If keyword is null -->
		<div class="text-center search-no-content">
			<p class="fs-3 fw-bold">Silakan Mencari Makanan! <i? class="far fa-smile"></i></p>
		</div>
	<?php endif; ?>
</div>
