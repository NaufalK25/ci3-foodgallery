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
                redirect('error');
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

        public function post_remove_saved_recipe()
        {
            $recipe_title = $this->input->post('saved-recipe');
            $this->Recipe->remove_recipe('saved_recipe', $this->session->username, $recipe_title);

            $this->session->set_flashdata(
                'remove_saved',
                '<div class="alert alert-success alert-dismissible d-flex align-items-center fade show text-start alert-recipe" role="alert">
                    <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
                    <div class="login-alert">
                        ' . $recipe_title . ' berhasil dihapus dari resep yang disimpan!
                    </div>
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
                'remove_made',
                '<div class="alert alert-success alert-dismissible d-flex align-items-center fade show text-start alert-recipe" role="alert">
                    <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
                    <div class="login-alert">
                        ' . $recipe_title . ' berhasil dihapus dari resep yang pernah dibuat!
                    </div>
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
                'remove_mastered',
                '<div class="alert alert-success alert-dismissible d-flex align-items-center fade show text-start alert-recipe" role="alert">
                    <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
                    <div class="login-alert">
                        ' . $recipe_title . ' berhasil dihapus dari resep yang telah dikuasai!
                    </div>
                <button type="button" class="btn-close alert-button" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>'
            );

            redirect('profile');
        }
    }
?>