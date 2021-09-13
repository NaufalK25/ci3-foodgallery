<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class UserController extends CI_Controller {
        public function __construct()
        {
            parent::__construct();
            $this->load->model('User');
            $this->load->model('Recipe');
        }

        public function index()
        {
            if(!$this->session->username)
            {
                redirect();
            }
            else
            {
                $this->load->model('Api');
                
                $saved_recipe = $this->Recipe->show_recipe_by_user('saved_recipe', $this->session->username);
                $made_recipe = $this->Recipe->show_recipe_by_user('made_recipe', $this->session->username);
                $mastered_recipe = $this->Recipe->show_recipe_by_user('mastered_recipe', $this->session->username);
                
                $saved_recipe_details = [];
                foreach($saved_recipe as $saved)
                {
                    $recipe_detail = $this->Api->get_recipe_detail($saved['recipe_key']);
                    $saved['thumb'] = $recipe_detail->thumb;
                    array_push($saved_recipe_details, $saved);
                }

                $made_recipe_details = [];
                foreach($made_recipe as $made)
                {
                    $recipe_detail = $this->Api->get_recipe_detail($made['recipe_key']);
                    $made['thumb'] = $recipe_detail->thumb;
                    array_push($made_recipe_details, $made);
                }

                $mastered_recipe_details = [];
                foreach($mastered_recipe as $mastered)
                {
                    $recipe_detail = $this->Api->get_recipe_detail($mastered['recipe_key']);
                    $mastered['thumb'] = $recipe_detail->thumb;
                    array_push($mastered_recipe_details, $mastered);
                }
                
				$data = [
					'page_title' => '@' . $this->session->username . ' | FoodGallery',
					'url' => base_url() . 'profile',
					'user' => $this->User->get_username($this->session->username),
					'saved_recipe_details' => $saved_recipe_details,
					'made_recipe_details' => $made_recipe_details,
					'mastered_recipe_details' => $mastered_recipe_details,
				];

				$this->load->view('templates/header', $data);
				$this->load->view('user/profile');
				$this->load->view('templates/footer');
				$this->load->view('templates/script-footer');
            }
        }

		public function edit_user_profile()
		{
			$user = $this->User->get_username($this->session->username);

			// fullname
			$this->form_validation->set_rules('fullname', 'Fullname', 'required|trim', [
				'required' => '{field} tidak boleh kosong!'
			]);

			if($this->form_validation->run() == true)
			{
				$username = $this->input->post('username');
				$fullname = $this->input->post('fullname');

				// if user also want to change profile image
				$upload_image = $_FILES['edit-profile-image']['name'];

				if($upload_image)
				{
					$config['upload_path'] = './assets/img/profile/';
					$config['allowed_types'] = 'gif|jpg|png';
					$config['max_size']     = '2048';

					$this->upload->initialize($config);

					if($this->upload->do_upload('edit-profile-image'))
        		    {
						$old_profile_image = $user['image'];

						if($old_profile_image != 'default_user.jpg')
						{
							unlink(FCPATH . 'assets/img/profile/' . $old_profile_image);
						}

						$new_profile_image = $this->upload->data('file_name');
						$this->User->update_profile_image($new_profile_image);
					}
				}

				$this->User->update_user_profile($username, $fullname);

				$this->session->set_flashdata(
					'alert',
					'<div class="alert alert-success alert-dismissible d-flex align-items-center fade show alert-recipe" role="alert">
						<svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
						Profil anda berhasil diubah!
					<button type="button" class="btn-close alert-button" data-bs-dismiss="alert" aria-label="Close"></button>
					</div>'
				);

				redirect('profile');
			}
			else
			{
				$this->session->set_flashdata(
					'alert',
					'<div class="alert alert-danger alert-dismissible d-flex align-items-center fade show alert-recipe" role="alert">
							<svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Warning:"><use xlink:href="#exclamation-triangle-fill"/></svg>
							Profil anda gagal diubah!
						<button type="button" class="btn-close alert-button" data-bs-dismiss="alert" aria-label="Close"></button>
					</div>'
				);

				redirect('profile');
			}	
		}

		public function change_password()
		{
			$user = $this->User->get_username($this->session->username);

			// current password
			$this->form_validation->set_rules('current_password', 'Current Password', 'required|trim', [
				'required' => '{field} tidak boleh kosong!'
			]);
			// new password
			$this->form_validation->set_rules('new_password', 'New Password', 'required|trim|min_length[3]|matches[repeat_new_password]', [
				'required' => '{field} tidak boleh kosong!',
				'min_length' => '{field} terlalu pendek!',
				'matches' => '{field} tidak cocok!'
			]);
			// repeat new password
			$this->form_validation->set_rules('repeat_new_password', 'Repeat New Password', 'required|trim|matches[new_password]', [
				'required' => '{field} tidak boleh kosong!',
				'matches' => '{field} tidak cocok!'
			]);

			if($this->form_validation->run() == true)
			{
				$current_password = $this->input->post('current_password');
				$new_password = $this->input->post('new_password');

				if(!password_verify($current_password, $user['password']))
				{
					$this->session->set_flashdata(
						'alert',
						'<div class="alert alert-danger alert-dismissible d-flex align-items-center fade show alert-recipe" role="alert">
								<svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Warning:"><use xlink:href="#exclamation-triangle-fill"/></svg>
								Password yang anda inputkan salah!
							<button type="button" class="btn-close alert-button" data-bs-dismiss="alert" aria-label="Close"></button>
						</div>'
					);

					redirect('profile');
				}
				else
				{
					if($current_password == $new_password)
					{
						$this->session->set_flashdata(
							'alert',
							'<div class="alert alert-danger alert-dismissible d-flex align-items-center fade show alert-recipe" role="alert">
									<svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Warning:"><use xlink:href="#exclamation-triangle-fill"/></svg>
									Password baru tidak boleh sama dengan password lama!
								<button type="button" class="btn-close alert-button" data-bs-dismiss="alert" aria-label="Close"></button>
							</div>'
						);
					
						redirect('profile');
					}
					else
					{
						$hashed_password = password_hash($new_password, PASSWORD_DEFAULT);

						$this->User->change_user_password($this->session->username, $hashed_password);

						$this->session->set_flashdata(
							'alert',
							'<div class="alert alert-success alert-dismissible d-flex align-items-center fade show alert-recipe" role="alert">
								<svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
								Password anda berhasil diubah!
							<button type="button" class="btn-close alert-button" data-bs-dismiss="alert" aria-label="Close"></button>
							</div>'
						);
					
						redirect('profile');
					}
				}

				$this->session->set_flashdata(
					'alert',
					'<div class="alert alert-success alert-dismissible d-flex align-items-center fade show alert-recipe" role="alert">
						<svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
						Password anda berhasil diubah!
					<button type="button" class="btn-close alert-button" data-bs-dismiss="alert" aria-label="Close"></button>
					</div>'
				);
	
				redirect('profile');
			}
			else
			{
				$this->session->set_flashdata(
					'alert',
					'<div class="alert alert-danger alert-dismissible d-flex align-items-center fade show alert-recipe" role="alert">
							<svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Warning:"><use xlink:href="#exclamation-triangle-fill"/></svg>
							Password anda gagal diubah!
						<button type="button" class="btn-close alert-button" data-bs-dismiss="alert" aria-label="Close"></button>
					</div>'
				);

				redirect('profile');
			}

		}

        public function post_remove_saved_recipe()
        {
            $recipe_title = $this->input->post('saved-recipe');
            $this->Recipe->remove_recipe('saved_recipe', $this->session->username, $recipe_title);

            $this->session->set_flashdata(
                'alert',
                '<div class="alert alert-success alert-dismissible d-flex align-items-center fade show text-start alert-recipe" role="alert">
                    <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
                    ' . $recipe_title . ' berhasil dihapus dari resep yang disimpan!
                <button type="button" class="btn-close alert-button" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>'
            );
            
            redirect('profile');
        }

        public function post_remove_made_recipe()
        {
            $recipe_title = $this->input->post('made-recipe');
            $this->Recipe->remove_recipe('made_recipe', $this->session->username, $recipe_title);
            
            $this->session->set_flashdata(
                'alert',
                '<div class="alert alert-success alert-dismissible d-flex align-items-center fade show text-start alert-recipe" role="alert">
                    <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
                    ' . $recipe_title . ' berhasil dihapus dari resep yang pernah dibuat!
                <button type="button" class="btn-close alert-button" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>'
            );

            redirect('profile');
        }
        
        public function post_remove_mastered_recipe()
        {
            $recipe_title = $this->input->post('mastered-recipe');
            $this->Recipe->remove_recipe('mastered_recipe', $this->session->username, $recipe_title);
            
            $this->session->set_flashdata(
                'alert',
                '<div class="alert alert-success alert-dismissible d-flex align-items-center fade show text-start alert-recipe" role="alert">
                    <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
                    ' . $recipe_title . ' berhasil dihapus dari resep yang telah dikuasai!
                <button type="button" class="btn-close alert-button" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>'
            );

            redirect('profile');
        }
    }
?>
