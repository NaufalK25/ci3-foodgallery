<?php
    defined('BASEPATH') OR exit('No direct script access allowed');

    class Recipe extends CI_Controller {
        public function index()
        {
            $this->load->model('Api');
            $today_recipe = $this->Api->get_today_recipe();
            $recipe_detail = $this->Api->get_recipe_detail($today_recipe->key);

            $data = [
                'page_title' => 'FoodGallery',
                'url' => base_url() . 'recipe',
                'today_recipe' => $today_recipe,
                'recipe_detail' => $recipe_detail
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
                $data = [
                    'page_title' => 'Recipe List | FoodGallery',
                    'url' => base_url() . 'recipe-list'
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
    
                $this->load->model('Api'); 
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
                    $data = [
                        'page_title' => $recipe_detail->title,
                        'url' => '',
                        'recipe_detail' => $recipe_detail
                    ];
    
                    $this->load->view('templates/header', $data);
                    $this->load->view('detail');
                    $this->load->view('templates/footer');
                    $this->load->view('templates/script-footer');
                }
            }
        }
    }
?>