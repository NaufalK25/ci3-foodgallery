<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class User_Controller extends CI_Controller {
        public function __construct()
        {
            parent::__construct();
            $this->load->model('User');
        }

        public function index()
        {   
            if(!$this->session->username)
            {
                // username
                $this->form_validation->set_rules('username', 'Username', 'required|trim', [
                    'required' => 'Username tidak boleh kosong!',
                ]);
                // password
                $this->form_validation->set_rules('password', 'Password', 'required|trim', [
                    'required' => 'Password tidak boleh kosong!',
                ]);
                
                if($this->form_validation->run() == false)
                {
                    $data = [
                        'page_title' => 'Login | FoodGallery',
                        'url' => base_url() . 'login'
                    ];
        
                    $this->load->view('templates/header', $data);
                    $this->load->view('login');
                    $this->load->view('templates/script-footer');
                }
                else
                {
                    $username = $this->input->post('username');
                    $password = $this->input->post('password');
    
                    $user = $this->User->get_username($username);
    
                    if($user)
                    {
                        if(password_verify($password, $user['password']))
                        {
                            $data = [
                                'username' => $user['username']
                                // 'image' => $user['image'],
                                // 'date_created' => $user['date_created']
                            ];
    
                            $this->session->set_userdata($data);

                            $this->session->set_flashdata(
                                'message',
                                '<div class="alert alert-success alert-dismissible d-flex align-items-center fade show home-alert" role="alert">
                                    <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
                                    <div class="login-alert">
                                        Selamat datang ' . $data['username'] . ', silakan mencari resep yang anda inginkan!
                                    </div>
                                <button type="button" class="btn-close home-alert-button" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>'
                            );

                            redirect();
                        }
                        else
                        {
                            $this->session->set_flashdata(
                                'message',
                                '<div class="alert alert-danger alert-dismissible d-flex align-items-center fade show" role="alert">
                                    <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Warning:"><use xlink:href="#exclamation-triangle-fill"/></svg>
                                    <div class="login-alert">
                                        Password anda salah!
                                    </div>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>'
                            );
                            redirect('login');
                        }
                    }
                    else
                    {
                        $this->session->set_flashdata(
                            'message',
                            '<div class="alert alert-danger alert-dismissible d-flex align-items-center fade show" role="alert">
                                <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Warning:"><use xlink:href="#exclamation-triangle-fill"/></svg>
                                <div class="login-alert">
                                    Username belum terdaftar!
                                </div>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>'
                        );
                        redirect('login');
                    }
                }
            }
            else
            {
                redirect('error');
            }
        }

        public function register()
        {
            if(!$this->session->username)
            {
                // fullname
                $this->form_validation->set_rules('fullname', 'Fullname', 'required|trim', [
                    'required' => 'Nama tidak boleh kosong!'
                ]);
                // username
                $this->form_validation->set_rules('username', 'Username', 'required|trim|is_unique[user.username]', [
                    'required' => 'Username tidak boleh kosong!',
                    'is_unique' => 'Username telah terdaftar!'
                ]);
                // password
                $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[3]|matches[password2]', [
                    'required' => 'Password tidak boleh kosong!',
                    'matches' => 'Password tidak cocok!',
                    'min_length' => 'Password terlalu pendek!'
                ]);
                // confirm password
                $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]', [
                    'required' => 'Konfirmasi Password tidak boleh kosong!',
                ]);
    
                if($this->form_validation->run( ) == false)
                {
                    $data = [
                        'page_title' => 'Register | FoodGallery',
                        'url' => base_url() . 'register'
                    ];
        
                    $this->load->view('templates/header', $data);
                    $this->load->view('register');
                    $this->load->view('templates/script-footer');
                }
                else
                {
                    $data = [
                        'username' => htmlspecialchars($this->input->post('username', true)),
                        'fullname' => htmlspecialchars($this->input->post('fullname', true)),
                        'image' => 'default_user.png',
                        'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
                        'date_created' => time()
                    ];
    
                    $this->User->add_new_user($data);
    
                    $this->session->set_flashdata(
                        'message',
                        '<div class="alert alert-success alert-dismissible d-flex align-items-center fade show" role="alert">
                            <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
                            <div class="login-alert">
                                Selamat ' . $data['username'] . ', akun anda berhasil dibuat! Silakan login
                            </div>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>'
                    );
                    redirect('login');
                }
            }
            else
            {
                redirect('error');
            }
        }

        public function logout()
        {
            if(!$this->session->username)
            {
                redirect('error');
            }
            else
            {
                $this->session->unset_userdata($this->session->username);
                $this->session->sess_destroy();
                redirect();
            }
        }

        public function get_user_profile()
        {
            if(!$this->session->username)
            {
                redirect('error');
            }
            else
            {
                $this->load->model('Recipe');
                $this->load->model('Api');
                
                $saved_recipe = $this->Recipe->show_recipe_by_user('saved_recipe', $this->session->username);
                $made_recipe = $this->Recipe->show_recipe_by_user('made_recipe', $this->session->username);
                $mastered_recipe = $this->Recipe->show_recipe_by_user('mastered_recipe', $this->session->username);
                
                $saved_recipe_details = [];
                foreach($saved_recipe as $saved)
                {
                    array_push($saved_recipe_details, $this->Api->get_recipe_detail($saved['recipe_key']));
                }

                $made_recipe_details = [];
                foreach($made_recipe as $made)
                {
                    array_push($made_recipe_details, $this->Api->get_recipe_detail($made['recipe_key']));
                }

                $mastered_recipe_details = [];
                foreach($mastered_recipe as $mastered)
                {
                    array_push($mastered_recipe_details, $this->Api->get_recipe_detail($mastered['recipe_key']));
                }
                
                $data = [
                    'page_title' => '@' . $this->session->username . ' | FoodGallery',
                    'url' => base_url() . 'profile',
                    'user' => $this->User->get_username($this->session->username),
                    'saved_recipe' => $saved_recipe,
                    'made_recipe' => $made_recipe,
                    'mastered_recipe' => $mastered_recipe,
                    'saved_recipe_details' => $saved_recipe_details,
                    'made_recipe_details' => $made_recipe_details,
                    'mastered_recipe_details' => $mastered_recipe_details
                ];
    
                $this->load->view('templates/header', $data);
                $this->load->view('profile');
                $this->load->view('templates/footer');
                $this->load->view('templates/script-footer');
            }
        }

        public function error()
        {
            echo 'error';
        }
    }
?>