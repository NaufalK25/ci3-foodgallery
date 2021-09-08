<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class Recipe extends CI_Model {
        public function add_new_recipe($table, $saved_recipe)
        {
            return $this->db->insert($table, $saved_recipe);
        }

        public function is_recipe_exist($table, $username, $recipe_title)
        {
            $recipe = $this->db->get_where($table, [
                'username' => $username,
                'recipe_title' => $recipe_title
            ])->result_array();

            if(count($recipe) > 0)
            {
                return true;
            }
            else
            {
                return false;
            }
        }

        public function count_rows($table, $recipe_title)
        {
            return $this->db->distinct('username')->get_where($table, ['recipe_title' => $recipe_title])->num_rows();
        }

        public function show_recipe_by_user($table, $username)
        {
            return $this->db->select()->get_where($table, ['username' => $username])->result_array();
        }
    }
?>