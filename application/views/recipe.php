<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
?>

<link rel="stylesheet" href="<?= base_url(); ?>assets/css/recipe.css">
<link rel="stylesheet" href="<?= base_url(); ?>assets/css/templates/navbar.css">
<link rel="stylesheet" href="<?= base_url(); ?>assets/css/templates/footer.css">
</head>
<body>

<?php
    $this->load->view('templates/navbar');
?>

<?php
    $page = $this->uri->segment(2, 0);
    $before = $page - 1;
    $after = $page + 1;
?>

<?php if($page != 1): ?>
    <a href="<?= base_url(); ?>recipe-list/<?= $before ?>"><?= $before ?></a>
    <a href="<?= base_url(); ?>recipe-list/<?= $after ?>"><?= $after ?></a>
<?php else: ?>
    1 <a href="<?= base_url(); ?>recipe-list/<?= $after ?>"><?= $after ?></a>
<?php endif; ?>

<ul>
    <?php $i = 1; ?>
    <?php foreach($recipe_per_page as $recipe): ?>
        <li><?= $i; ?></li>
        <li><?= $recipe->title; ?></li>
        <li><img src="<?= $recipe->thumb; ?>" alt="<?= $recipe->title; ?>"></li>
        <li><?= $recipe->key; ?></li>
        <li><i class="fas fa-arrow-up"></i> <?= $recipe->dificulty; ?></li>
        <li><i class="fas fa-clock"></i> <?= $recipe->times; ?></li>
        <li><i class="fas fa-utensils"></i> <?= $recipe->portion; ?></li>
            <table class="table table-hover">
                <thead>
                    <tr class=text-center>
                        <th scope="col">Total</th>
                        <th scope="col">Keterangan</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="text-center">
                        <td class="align-middle">0</td>
                        <td class="align-middle">Disimpan</td>
                        <td>
                            <form action="" method="POST">
                                <button type="submit" class="btn btn-outline-dark">Simpan</button>
                            </form>
                        </td>
                    </tr>
                    <tr class="text-center">
                        <td class="align-middle">0</td>
                        <td class="align-middle">Dibuat</td>
                        <td>
                            <form action="" method="POST">
                                <button type="submit" class="btn btn-outline-dark">Pernah Membuat</button>
                            </form>
                        </td>
                    </tr>
                    <tr class="text-center">
                        <td class="align-middle">0</td>
                        <td class="align-middle">Dikuasai</td>
                        <td>
                            <form action="" method="POST">
                                <button type="submit" class="btn btn-outline-dark">Telah Menguasai</button>
                            </form>
                        </td>
                    </tr>
                </tbody>
            </table>
    <?php $i++; ?>
    <?php endforeach; ?>
</ul>