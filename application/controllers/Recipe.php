<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class Recipe extends CI_Controller {
        public function index()
        {
            $data['page_title']= 'Recipe List | FoodGallery';
            $this->load->view('templates/header', $data);
            $this->load->view('recipe', [
                'url' => base_url() . 'recipe'
            ]);
            $this->load->view('templates/footer');
            $this->load->view('templates/script-footer');
        }

        public function detail()
        {
            $key = $this->uri->segment(3, 0);

            $this->load->model('Api'); 
            $recipe_detail = $this->Api->get_recipe_detail($key);

            if(
                empty($recipe_detail->needItem) && 
                empty($recipe_detail->ingredient) &&
                empty($recipe_detail->step) &&
                $recipe_detail->new_title == 0
            )
            {
                $data['page_title'] = 'Error';  
                $this->load->view('templates/header', $data);
                $this->load->view('error_404');
            }
            else
            {
                $data['page_title'] = 'Resep ' . $recipe_detail->new_title;
                $this->load->view('templates/header', $data);
                $this->load->view('detail', [
                    'url' => '',
                    'recipe_detail' => $recipe_detail
                ]);
                $this->load->view('templates/footer');
                $this->load->view('templates/script-footer');
            }
        }
    }
?>