<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
?>

<link rel="stylesheet" href="<?= base_url(); ?>assets/css/detail.css">
<link rel="stylesheet" href="<?= base_url(); ?>assets/css/templates/navbar.css">
<link rel="stylesheet" href="<?= base_url(); ?>assets/css/templates/footer.css">
</head>
<body>

<?php
    $this->load->view('templates/navbar', [
        'url' => ''
    ]);
?>

<div class="container">
    <ul>
        <li>new title = <?= $recipe_detail->new_title; ?></li>
        <li>title = <?= $recipe_detail->title; ?></li>
        <li>
            <img src="<?= $recipe_detail->thumb; ?>" alt="<?= $recipe_detail->new_title; ?>"  width="500">
        </li>
        <li>servings = <?= $recipe_detail->servings; ?></li>
        <li>times = <?= $recipe_detail->times; ?></li>
        <li>dificulty = <?= $recipe_detail->dificulty; ?></li>
        <li>desc = <?= $recipe_detail->desc; ?></li>
    </ul>
    Ingredient:
    <?php $i = 0; ?>
    <ul>
        <?php foreach($recipe_detail->ingredient as $ingredient): ?>
            <li><?= $i + 1 . '. ' . $ingredient; ?></li>
            <?php $i++; ?>
        <?php endforeach; ?>
    </ul>
    Step:
    <ul>
        <?php foreach($recipe_detail->step as $step): ?>
            <li><?= $step; ?></li>
        <?php endforeach; ?>
    </ul>
</div>