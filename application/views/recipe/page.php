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

<?php
    $page = $this->uri->segment(3, 0);
    $before = $page - 1;
    $after = $page + 1;
?>

<?php if($page != 1): ?>
    <a href="<?= base_url(); ?>recipe/page/<?= $before ?>"><?= $before ?></a>
    <a href="<?= base_url(); ?>recipe/page/<?= $after ?>"><?= $after ?></a>
<?php else: ?>
    1 <a href="<?= base_url(); ?>recipe/page/<?= $after ?>"><?= $after ?></a>
<?php endif; ?>

<ul>
    <?php $i = 1; ?>
    <?php foreach($recipe_per_page as $recipe): ?>
        <li><?= $i; ?></li>
        <li><?= $recipe->title; ?></li>
        <li><img src="<?= $recipe->thumb; ?>" alt="<?= $recipe->title; ?>" width="300"></li>
        <li><?= $recipe->new_title; ?></li>
        <li><?= $recipe->key; ?></li>
        <li><i class="fas fa-arrow-up"></i> <?= $recipe->dificulty; ?></li>
        <li><i class="fas fa-clock"></i> <?= $recipe->times; ?></li>
        <li><i class="fas fa-utensils"></i> <?= $recipe->portion; ?></li>
        <a href="<?= base_url(); ?>recipe/detail/<?= $recipe->key ?>">Detail</a>
    <?php $i++; ?>
    <?php endforeach; ?>
</ul>