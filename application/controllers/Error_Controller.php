<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class Error_Controller extends CI_Controller {
        public function error_404()
        {
            $data = [
                'page_title' => '404 Page Not Found',
                'url' => ''
            ];

            $this->load->view('templates/header', $data);
            $this->load->view('errors/html/error_404');
            $this->load->view('templates/footer');
            $this->load->view('templates/script-footer');
        }
    }
?>