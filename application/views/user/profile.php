<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
?>

<link rel="stylesheet" href="<?= base_url(); ?>assets/css/user/profile.css">
<link rel="stylesheet" href="<?= base_url(); ?>assets/css/templates/navbar.css">
<link rel="stylesheet" href="<?= base_url(); ?>assets/css/templates/footer.css">
</head>
<body>

<?php
    $this->load->view('templates/navbar');
?>

<?= $this->session->flashdata('alert'); ?>

<div class="profile-kotak">
    <!-- Srart of Profile -->
    <div class="row m-0 justify-content-center">
        <div class="col mb-4 text-center">
            <img src="<?= base_url(); ?>assets/img/profile/<?= $user['image']; ?>" class="profile-image" alt="<?= $user['username']; ?>">
        </div>
        <div class="col">
            <table class="table table-hover table-borderless mb-3">
                <tbody>
					<tr>
						<th scope="row">Username</th>
                        <td><?= $user['username'] ?></td>
                    </tr>
					<tr>
						<th scope="row">Nama Lengkap</th>
						<td><?= $user['fullname']; ?></td>
					</tr>
                    <tr>
                        <th scope="row">Akun Dibuat Sejak</th>
                        <td><?= date('d F Y', $user['date_created']); ?></td>
                    </tr>
                </tbody>
            </table>
            <!-- Edit Profile Modal Button -->
            <button type="button" class="btn btn-outline-warning mb-2 me-2 profile-button" data-bs-toggle="modal" data-bs-target="#editProfileModal">Edit Profil</button>
            <a href="#profile-simpan" class="btn btn-outline-primary mb-2 me-2 profile-button">Simpan</a>
            <a href="#profile-buat" class="btn btn-outline-primary mb-2 me-2 profile-button">Pernah Dibuat</a>
            <a href="#profile-kuasa" class="btn btn-outline-primary mb-2 me-2 profile-button">Telah Dikuasai</a>
            <a href="<?= base_url(); ?>logout" class="btn btn-outline-danger mb-2 profile-button">Keluar</a>
        </div>
    </div>
    <!-- End of Profile -->

    <!-- Start of Saved Recipe -->
    <div class="row m-0">
        <p class="fs-3 fw-bold mt-5" id="profile-simpan">Resep Yang Disimpan</p>
        <hr>
		<?php if(count($saved_recipe_details) > 0): ?>
        	<div class="row m-0 gy-5 px-0 pb-5 justify-content-center bg-secondary">
        	    <?php for($i = 0; $i < count($saved_recipe_details); $i++): ?>
        	        <div class="col-lg-4 mx-5 p-0 card border-dark text-center profile-card">
        	            <img src="<?= $saved_recipe_details[$i]['thumb'] ?>" alt="<?= $saved_recipe_details[$i]['recipe_title'] ?>" class="card-img-top" height="150">
        	            <div class="card-body">
        	                <div class="row h-50">
        	                    <p class="card-title fw-bold text-start profile-card-tulisan h-25"><?= $saved_recipe_details[$i]['recipe_title'] ?></p>
        	                </div>
        	                <div class="row h-50 align-items-end">
        	                    <div class="col">
        	                        <a href="<?= base_url(); ?>recipe/detail/<?= $saved_recipe_details[$i]['recipe_key'] ?>" class="btn btn-outline-info me-2 profile-button">Detail</a>
        	                    </div>
        	                    <div class="col">
        	                        <!-- Saved Recipe Modal Button -->
        	                         <button type="button" class="btn btn-outline-danger profile-button" data-bs-toggle="modal" data-bs-target="#savedRecipeModal<?= $i ?>">
        	                            Hapus
        	                        </button>
        	                        <!-- Start of Saved Recipe Modal -->
        	                        <div class="modal fade" id="savedRecipeModal<?= $i ?>" tabindex="-1" aria-labelledby="savedRecipeModalLabel<?= $i ?>" aria-hidden="true">
        	                            <div class="modal-dialog">
        	                                <div class="modal-content">
        	                                    <div class="modal-header">
        	                                        <p class="modal-title" id="savedRecipeModalLabel<?= $i ?>">Resep Yang Disimpan</p>
        	                                        <button type="button" class="btn-close alert-button" data-bs-dismiss="modal" aria-label="Close"></button>
        	                                    </div>
        	                                    <div class="modal-body">
        	                                        Ingin Menghapus <?= $saved_recipe_details[$i]['recipe_title'] ?>?
        	                                    </div>
        	                                    <div class="modal-footer">
        	                                        <form action="<?= base_url(); ?>UserController/post_remove_saved_recipe" method="POST">
        	                                            <input type="hidden" name="saved-recipe" id="saved-recipe" value="<?= $saved_recipe_details[$i]['recipe_title'] ?>">
        	                                            <button type="submit" class="btn btn-outline-success profile-button"">Iya</button>
        	                                        </form>
        	                                        <button type="button" class="btn btn-outline-danger profile-button" data-bs-dismiss="modal">Tidak</button>
        	                                    </div>
        	                                </div>
        	                            </div>
        	                        </div>
        	                        <!-- End of Saved Recipe Modal -->
        	                    </div>
        	                </div>
        	            </div>
        	        </div>
        	    <?php endfor; ?>
        	</div>
		<?php else: ?>
			<p class="text-center fs-5">Anda belum menambahkan makanan yang disimpan. Silakan cari makanan <a href="<?= base_url() ?>recipe/page/1" class="profile-link">disini</a>! <i class="far fa-smile"></i></p>
		<?php endif; ?>
    </div>
    <!-- End of Saved Recipe -->

    <!-- Start of Made Recipe -->
    <div class="row m-0">
		<p class="fs-3 fw-bold mt-5" id="profile-buat">Resep Yang Pernah Dibuat</p>
        <hr>
		<?php if(count($made_recipe_details) > 0): ?>
        	<div class="row m-0 gy-5 px-0 pb-5 justify-content-center bg-secondary">
            	<?php for($i = 0; $i < count($made_recipe_details); $i++): ?>
            	    <div class="col-lg-4 mx-5 p-0 card border-dark text-center profile-card">
            	        <img src="<?= $made_recipe_details[$i]['thumb'] ?>" alt="<?= $made_recipe_details[$i]['recipe_title'] ?>" class="card-img-top" height="150">
            	        <div class="card-body">
            	            <div class="row h-50">
            	                <p class="card-title fw-bold text-start profile-card-tulisan h-25"><?= $made_recipe_details[$i]['recipe_title'] ?></p>
            	            </div>
            	            <div class="row h-50 align-items-end">
            	                <div class="col">
            	                    <a href="<?= base_url(); ?>recipe/detail/<?= $made_recipe_details[$i]['recipe_key'] ?>" class="btn btn-outline-info me-2 profile-button">Detail</a>
            	                </div>
            	                <div class="col">
            	                    <!-- Made Recipe Modal Button -->
            	                     <button type="button" class="btn btn-outline-danger profile-button" data-bs-toggle="modal" data-bs-target="#madeRecipeModal<?= $i ?>">
            	                        Hapus
            	                    </button>
            	                    <!-- Start of Made Recipe Modal -->
            	                    <div class="modal fade" id="madeRecipeModal<?= $i ?>" tabindex="-1" aria-labelledby="madeRecipeModalLabel<?= $i ?>" aria-hidden="true">
            	                        <div class="modal-dialog">
            	                            <div class="modal-content">
            	                                <div class="modal-header">
            	                                    <p class="modal-title" id="madeRecipeModalLabel<?= $i ?>">Resep Yang Pernah Dibuat</p>
            	                                    <button type="button" class="btn-close alert-button" data-bs-dismiss="modal" aria-label="Close"></button>
            	                                </div>
            	                                <div class="modal-body">
            	                                    Ingin Menghapus <?= $made_recipe_details[$i]['recipe_title'] ?>?
            	                                </div>
            	                                <div class="modal-footer">
            	                                    <form action="<?= base_url(); ?>UserController/post_remove_made_recipe" method="POST">
            	                                        <input type="hidden" name="made-recipe" id="made-recipe" value="<?= $made_recipe_details[$i]['recipe_title'] ?>">
            	                                        <button type="submit" class="btn btn-outline-success profile-button"">Iya</button>
            	                                    </form>
            	                                    <button type="button" class="btn btn-outline-danger profile-button" data-bs-dismiss="modal">Tidak</button>
            	                                </div>
            	                            </div>
            	                        </div>
            	                    </div>
            	                    <!-- End of Made Recipe Modal -->
            	                </div>
            	            </div>
            	        </div>
            	    </div>
            	<?php endfor; ?>
			</div>
		<?php else: ?>
			<p class="text-center fs-5">Anda belum menambahkan makanan yang pernah dibuat. Silakan cari makanan <a href="<?= base_url() ?>recipe/page/1" class="profile-link">disini</a>! <i class="far fa-smile"></i></p>
		<?php endif; ?>
    </div>
    <!-- End of Made Recipe -->

    <!-- Start of Mastered Recipe -->
    <div class="row m-0">
        <p class="fs-3 fw-bold mt-5" id="profile-kuasa">Resep Yang Telah Dikuasai</p>
        <hr>
		<?php if(count($mastered_recipe_details) > 0): ?>
        	<div class="row m-0 gy-5 px-0 pb-5 justify-content-center bg-secondary">
        	    <?php for($i = 0; $i < count($mastered_recipe_details); $i++): ?>
        	        <div class="col-lg-4 mx-5 p-0 card border-dark text-center profile-card">
        	            <img src="<?= $mastered_recipe_details[$i]['thumb'] ?>" alt="<?= $mastered_recipe_details[$i]['recipe_title'] ?>" class="card-img-top" height="150">
        	            <div class="card-body">
        	                <div class="row h-50">
        	                    <p class="card-title fw-bold text-start profile-card-tulisan h-25"><?= $mastered_recipe_details[$i]['recipe_title'] ?></p>
        	                </div>
        	                <div class="row h-50 align-items-end">
        	                    <div class="col">
        	                        <a href="<?= base_url(); ?>recipe/detail/<?= $mastered_recipe_details[$i]['recipe_key'] ?>" class="btn btn-outline-info me-2 profile-button">Detail</a>
        	                    </div>
        	                    <div class="col">
        	                        <!-- Mastered Recipe Modal Button -->
        	                         <button type="button" class="btn btn-outline-danger profile-button" data-bs-toggle="modal" data-bs-target="#masteredRecipeModal<?= $i ?>">
        	                            Hapus
        	                        </button>
        	                        <!-- Start of Mastered Recipe Modal -->
        	                        <div class="modal fade" id="masteredRecipeModal<?= $i ?>" tabindex="-1" aria-labelledby="masteredRecipeModalLabel<?= $i ?>" aria-hidden="true">
        	                            <div class="modal-dialog">
        	                                <div class="modal-content">
        	                                    <div class="modal-header">
        	                                        <p class="modal-title" id="masteredRecipeModalLabel<?= $i ?>">Resep Yang Telah Dikuasai</p>
        	                                        <button type="button" class="btn-close alert-button" data-bs-dismiss="modal" aria-label="Close"></button>
        	                                    </div>
        	                                    <div class="modal-body">
        	                                        Ingin Menghapus <?= $mastered_recipe_details[$i]['recipe_title'] ?>?
        	                                    </div>
        	                                    <div class="modal-footer">
        	                                        <form action="<?= base_url(); ?>UserController/post_remove_mastered_recipe" method="POST">
        	                                            <input type="hidden" name="mastered-recipe" id="mastered-recipe" value="<?= $mastered_recipe_details[$i]['recipe_title'] ?>">
        	                                            <button type="submit" class="btn btn-outline-success profile-button"">Iya</button>
        	                                        </form>
        	                                        <button type="button" class="btn btn-outline-danger profile-button" data-bs-dismiss="modal">Tidak</button>
        	                                    </div>
        	                                </div>
        	                            </div>
        	                        </div>
        	                        <!-- End of Mastered Recipe Modal -->
        	                    </div>
        	                </div>
        	            </div>
        	        </div>
        	    <?php endfor; ?>
        	</div>
		<?php else: ?>
			<p class="text-center fs-5">Anda belum menambahkan makanan yang telah dikuasai. Silakan cari makanan <a href="<?= base_url() ?>recipe/page/1" class="profile-link">disini</a>! <i class="far fa-smile"></i></p>
		<?php endif; ?>
    </div>
    <!-- End of Mastered Recipe -->
</div>

<!-- Edit Profile Modal -->
<div class="modal fade" id="editProfileModal" tabindex="-1" aria-labelledby="editProfileModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <p class="modal-title" id="editProfileModalLabel">Edit Profil</p>
                <button type="button" class="btn-close alert-button" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
				<?= form_open_multipart('UserController/edit_user_profile'); ?>
					<div class="form-floating mb-3">
                		<input type="text" class="form-control border-dark profile-input" id="username" name="username" placeholder="Username" value="<?= $user['username'] ?>" readonly>
                		<label for="username"><i class="fas fa-user"></i> Username</label>
            		</div>
					<div class="form-floating mb-3">
                		<input type="text" class="form-control border-dark profile-input" id="fullname" name="fullname" placeholder="Username" value="<?= $user['fullname'] ?>" autofocus>
                		<label for="fullname"><i class="fas fa-user"></i> Fullname</label>
						<?= form_error('fullname', '<small class="profile-error">', '</small>') ?>
            		</div>
					<div class="mb-3">
						<div class="row">
							<div class="col-lg-3 text-center mb-3">
								<img src="<?= base_url() ?>assets/img/profile/<?= $user['image'] ?>" alt="<?= $user['username'] ?>" width="100" id="edit-profile-image">
							</div>
							<div class="col-lg-9">	
								<input type="file" class="form-control btn btn-outline-dark w-100 profile-input" name="edit-profile-image" onchange="document.getElementById('edit-profile-image').src = window.URL.createObjectURL(this.files[0])">
							</div>
						</div>
					</div>
            </div>
            <div class="modal-footer">
                	<button type="submit" class="btn btn-outline-success profile-button">Simpan</button>
				</form>
				<button type="button" class="btn btn-outline-danger profile-button" data-bs-dismiss="modal">Kembali</button>
            </div>
        </div>
    </div>
</div>
