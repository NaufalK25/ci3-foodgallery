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
            $this->load->view('templates/scipt-footer');
        }
    }
?>