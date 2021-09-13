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

<form action="<?= base_url() ?>RecipeController/get_search_keyword" method="POST">
    <input class="form-control border-dark search-input" type="search" name="search-keyword" placeholder="Cari makanan disini..." aria-label="Search" autofocus>
    <button type="submit" class="btn btn-outline-success search-button"><i class="fas fa-search"></i> Cari</button>
</form>

<?php if($keyword): ?>
	<ul>
    <?php $i = 1; ?>
    <?php foreach($recipe_by_keyword as $recipe): ?>
        <li><?= $i; ?></li>
        <li><?= $recipe->title; ?></li>
        <li><img src="<?= $recipe->thumb; ?>" alt="<?= $recipe->title; ?>" width="300"></li>
        <li><?= $recipe->new_title; ?></li>
        <li><?= $recipe->key; ?></li>
        <li><i class="fas fa-arrow-up"></i> <?= $recipe->difficulty; ?></li>
        <li><i class="fas fa-clock"></i> <?= $recipe->times; ?></li>
        <li><i class="fas fa-utensils"></i> <?= $recipe->serving; ?></li>
        <a href="<?= base_url(); ?>recipe/detail/<?= $recipe->key ?>">Detail</a>
    <?php $i++; ?>
    <?php endforeach; ?>
</ul>
<?php endif; ?>
