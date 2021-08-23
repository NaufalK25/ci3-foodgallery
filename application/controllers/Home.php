<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class Home extends CI_Controller {
        public function index()
        {
            $data['page_title'] = 'Food Gallery';
            $this->load->view('templates/header', $data);
            $this->load->view('home/index', [
                'url' => base_url() . 'home/index'
            ]);
            $this->load->view('templates/footer');
            
        }

        public function login()
        {
            $data['page_title'] = 'Food Gallery | Login';
            $this->load->view('templates/header', $data);
            $this->load->view('home/login', [
                'url' => base_url() . 'home/login'
            ]);
            $this->load->view('templates/footer');
        }

        public function register()
        {
            $data['page_title'] = 'Food Gallery | Register';
            $this->load->view('templates/header', $data);
            $this->load->view('home/register', [
                'url' => base_url() . 'home/register'
            ]);
            $this->load->view('templates/footer');
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