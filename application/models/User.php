<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class User extends CI_Model {
        public function get_user_info($username)
        {
            $this->db->select('*');
            $this->db->from('user');
            $this->db->where('username', $username);

            $result = $this->db->get();

            return $result->result_array();
        }
    }
?>