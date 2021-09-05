<?php
    defined('BASEPATH') OR exit('No direct script access allowed');

    class Recipe extends CI_Controller {
        public function index()
        {
            $data = [
                'page_title' => 'Recipe List | FoodGallery',
                'url' => base_url() . 'recipe'
            ];

            $this->load->view('templates/header', $data);
            $this->load->view('recipe');
            $this->load->view('templates/footer');
            $this->load->view('templates/script-footer');
        }

        public function detail()
        {
            $key = $this->uri->segment(3, 0);

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
                redirect(base_url() . 'error');
            }
            else
            {
                $data = [
                    'page_title' => 'Resep ' . $recipe_detail->new_title,
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
?>