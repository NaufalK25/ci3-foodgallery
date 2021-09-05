<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class User extends CI_Model {
        public function add_new_user($user_info)
        {
            $this->db->insert('user', $user_info);
        }

        public function get_username($username)
        {
            return $this->db->get_where('user', ['username' => $username])->row_array();
        }
    }
?>