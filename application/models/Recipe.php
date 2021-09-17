<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class Recipe extends CI_Model {
        public function add_new_recipe($table, $recipe)
        {
            return $this->db->insert($table, $recipe);
        }

        public function is_recipe_exists($table, $username, $recipe_title)
        {
            $recipe = $this->db->get_where($table, [
                'username' => $username,
                'recipe_title' => $recipe_title
            ])->result_array();
            
            // return true if data with username = $username and recipe_title = $recipe_title exists
            return count($recipe) > 0;
        }

        public function count_rows($table, $recipe_title)
        {
            return $this->db->distinct('username')->get_where($table, ['recipe_title' => $recipe_title])->num_rows();
        }

        public function show_recipe_by_user($table, $username)
        {
            return $this->db->select()->get_where($table, ['username' => $username])->result_array();
        }

        public function count_recipe_by_user($table, $username)
        {
            return $this->db->select()->get_where($table, ['username' => $username])->num_rows();
        }

        public function remove_recipe($table, $username, $recipe_title)
        {
            return $this->db->delete($table, ['username' => $username, 'recipe_title' => $recipe_title]);
        }
    }
?>
