<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class Home extends CI_Controller {
        public function index()
        {
            $data['page_title'] = 'FoodGallery';
            $this->load->view('templates/header', $data);
            $this->load->view('home', [
                'url' => base_url() . 'home'
            ]);
            $this->load->view('templates/footer');
            $this->load->view('templates/scipt-footer');
            
        }

        public function register()
        {
            $data['page_title'] = 'Register | FoodGallery';
            $this->load->view('templates/header', $data);
            $this->load->view('register', [
                'url' => base_url() . 'home/register'
            ]);
            $this->load->view('templates/scipt-footer');
        }

        public function login()
        {
            $data['page_title'] = 'Login | FoodGallery';
            $this->load->view('templates/header', $data);
            $this->load->view('login', [
                'url' => base_url() . 'home/login'
            ]);
            $this->load->view('templates/scipt-footer');
        }

        public function post_data()
        {
            $username = $this->input->post('username');
            $password = $this->input->post('password');

            echo 'Username = ' . $username . '<br>';
            echo 'Password = ' . $password . '<br>';

            if($username == 'naufal' && $password == 'naufal') {
                echo 'Login berhasil';
            } else {
                echo 'Login gagal';
            }
        }
    }
?>