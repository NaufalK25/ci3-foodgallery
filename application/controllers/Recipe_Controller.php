<?php
    defined('BASEPATH') OR exit('No direct script access allowed');

    class Recipe_Controller extends CI_Controller {
        public function __construct()
        {
            parent::__construct();
            $this->load->model('Api');
            $this->load->model('Recipe');
        }

        public function index()
        {
            $today_recipe = $this->Api->get_today_recipe();
            $recipe_detail = $this->Api->get_recipe_detail($today_recipe->key);
            $count_saved = $this->Recipe->count_rows('saved_recipe', $today_recipe->title);
            $count_made = $this->Recipe->count_rows('made_recipe', $today_recipe->title);
            $count_mastered = $this->Recipe->count_rows('mastered_recipe', $today_recipe->title);

            $data = [
                'page_title' => 'FoodGallery',
                'url' => base_url() . 'home',
                'today_recipe' => $today_recipe,
                'recipe_detail' => $recipe_detail,
                'count_saved' => $count_saved,
                'count_made' => $count_made,
                'count_mastered' => $count_mastered
            ];

            $this->load->view('templates/header', $data);
            $this->load->view('home');
            $this->load->view('templates/footer');
            $this->load->view('templates/script-footer');
        }

        public function get_recipe_list()
        {
            if(!$this->session->username)
            {
                redirect('error');
            }
            else
            {
                $page = $this->uri->segment(2, 0);

                $recipe_per_page = $this->Api->get_recipe_per_page($page);

                $data = [
                    'page_title' => 'Recipe List | FoodGallery',
                    'url' => base_url() . 'recipe-list',
                    'recipe_per_page' => $recipe_per_page
                ];
    
                $this->load->view('templates/header', $data);
                $this->load->view('recipe');
                $this->load->view('templates/footer');
                $this->load->view('templates/script-footer');
            }
        }

        public function get_recipe_detail()
        {
            if(!$this->session->username)
            {
                redirect('error');
            }
            else
            {
                $key = $this->uri->segment(2, 0);
    
                $recipe_detail = $this->Api->get_recipe_detail($key);
    
    
                if(
                    !$recipe_detail ||
                    (
                        empty($recipe_detail->needItem) && 
                        empty($recipe_detail->ingredient) &&
                        empty($recipe_detail->step) &&
                        $recipe_detail->new_title == 0
                    )
                )
                {
                    redirect('error');
                }
                else
                {
                    $count_saved = $this->Recipe->count_rows('saved_recipe', $recipe_detail->title);
                    $count_made = $this->Recipe->count_rows('made_recipe', $recipe_detail->title);
                    $count_mastered = $this->Recipe->count_rows('mastered_recipe', $recipe_detail->title);

                    $data = [
                        'page_title' => $recipe_detail->title,
                        'url' => '',
                        'recipe_detail' => $recipe_detail,
                        'count_saved' => $count_saved,
                        'count_made' => $count_made,
                        'count_mastered' => $count_mastered
                    ];
    
                    $this->load->view('templates/header', $data);
                    $this->load->view('detail');
                    $this->load->view('templates/footer');
                    $this->load->view('templates/script-footer');
                }
            }
        }

        public function post_saved_recipe()
        {
            $page = $this->input->post('saved-page');
            $username = $this->input->post('saved-username');
            $recipe_key = $this->input->post('saved-key');
            $recipe_title = $this->input->post('saved-title');
            $table = 'saved_recipe';

            $data = [
                'username' => $username,
                'recipe_key' => $recipe_key,
                'recipe_title' => $recipe_title
            ];

            $is_recipe_exist = $this->Recipe->is_recipe_exist($table, $username, $recipe_title);

            if($is_recipe_exist)
            {
                $message = 'Resep Sudah Pernah Disimpan';
                $type = 'danger';
                $svg = '<svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Warning:"><use xlink:href="#exclamation-triangle-fill"/></svg>';
            }
            else
            {
                $this->Recipe->add_new_recipe($table, $data);
                $message = 'Resep Berhasil Disimpan';
                $type = 'success';
                $svg = '<svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>';
                
            }

            $this->session->set_flashdata(
                'already_saved',
                '<div class="alert alert-' . $type . ' alert-dismissible d-flex align-items-center fade show text-start alert-recipe" role="alert">
                    ' . $svg . '
                    <div class="login-alert">
                        ' . $message . '
                    </div>
                <button type="button" class="btn-close alert-button" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>'
            );
            
            redirect($page);
        }

        public function post_made_recipe()
        {
            $page = $this->input->post('made-page');
            $username = $this->input->post('made-username');
            $recipe_key = $this->input->post('made-key');
            $recipe_title = $this->input->post('made-title');
            $table = 'made_recipe';

            $data = [
                'username' => $username,
                'recipe_key' => $recipe_key,
                'recipe_title' => $recipe_title
            ];

            $is_recipe_exist = $this->Recipe->is_recipe_exist($table, $username, $recipe_title);

            if($is_recipe_exist)
            {
                $message = 'Resep Gagal Ditambahkan';
                $type = 'danger';
                $svg = '<svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Warning:"><use xlink:href="#exclamation-triangle-fill"/></svg>';
            }
            else
            {
                $this->Recipe->add_new_recipe($table, $data);
                $message = 'Resep Berhasil Ditambahkan';
                $type = 'success';
                $svg = '<svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>';
                
            }

            $this->session->set_flashdata(
                'already_saved',
                '<div class="alert alert-' . $type . ' alert-dismissible d-flex align-items-center fade show text-start alert-recipe" role="alert">
                    ' . $svg . '
                    <div class="login-alert">
                        ' . $message . '
                    </div>
                <button type="button" class="btn-close alert-button" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>'
            );
            
            redirect($page);
        }

        public function post_mastered_recipe()
        {
            $page = $this->input->post('mastered-page');
            $username = $this->input->post('mastered-username');
            $recipe_key = $this->input->post('mastered-key');
            $recipe_title = $this->input->post('mastered-title');
            $table = 'mastered_recipe';

            $data = [
                'username' => $username,
                'recipe_key' => $recipe_key,
                'recipe_title' => $recipe_title
            ];

            $is_recipe_exist = $this->Recipe->is_recipe_exist($table, $username, $recipe_title);

            if($is_recipe_exist)
            {
                $message = 'Resep Gagal Ditambahkan';
                $type = 'danger';
                $svg = '<svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Warning:"><use xlink:href="#exclamation-triangle-fill"/></svg>';
            }
            else
            {
                $this->Recipe->add_new_recipe($table, $data);
                $message = 'Resep Berhasil Ditambahkan';
                $type = 'success';
                $svg = '<svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>';
                
            }

            $this->session->set_flashdata(
                'already_saved',
                '<div class="alert alert-' . $type . ' alert-dismissible d-flex align-items-center fade show text-start alert-recipe" role="alert">
                    ' . $svg . '
                    <div class="login-alert">
                        ' . $message . '
                    </div>
                <button type="button" class="btn-close alert-button" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>'
            );
            
            redirect($page);
        }
    }
?>