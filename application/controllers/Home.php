<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class Home extends CI_Controller {
        public function index()
        {   
            $this->load->model('Api');
            $today_recipe = $this->Api->get_today_recipe();
            $recipe_detail = $this->Api->get_recipe_detail($today_recipe->key);

            $data['page_title'] = 'FoodGallery';
            $this->load->view('templates/header', $data);
            $this->load->view('home', [
                'url' => base_url() . 'home',
                'today_recipe' => $today_recipe,
                'recipe_detail' => $recipe_detail
            ]);
            $this->load->view('templates/footer');
            $this->load->view('templates/script-footer');
            
        }

        public function register()
        {
            $data['page_title'] = 'Register | FoodGallery';
            $this->load->view('templates/header', $data);
            $this->load->view('register', [
                'url' => base_url() . 'home/register'
            ]);
            $this->load->view('templates/script-footer');
        }

        public function login()
        {
            $data['page_title'] = 'Login | FoodGallery';
            $this->load->view('templates/header', $data);
            $this->load->view('login', [
                'url' => base_url() . 'home/login'
            ]);
            $this->load->view('templates/script-footer');
        }
    }
?>