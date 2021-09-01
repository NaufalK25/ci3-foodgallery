<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class Api extends CI_Model {
        public function connect_api($url)
        {
            $json_data = @file_get_contents($url);

            if(!$json_data)
            {
                return false;
            }

            $response_data = json_decode($json_data);
            return $response_data->results;  

        }

        public function get_recipe_name($recipe_key)
        {
            $new_recipe_key = preg_replace('(resep|cara|membuat)', '', $recipe_key);
            $new_recipe_key = ltrim($new_recipe_key, '-');
            $new_recipe_key = rtrim($new_recipe_key, '-');
            
            $new_recipe_key_arr = explode('-', $new_recipe_key);

            $temp = [];
            for($i = 0; $i < count($new_recipe_key_arr); $i++)
            {
                array_push($temp, ucfirst($new_recipe_key_arr[$i]));
            }
    
            $new_recipe_key = implode(' ', $temp);

            return $new_recipe_key;
        }

        public function get_today_recipe()
        {
            $url = API_URL . 'api/recipes';
            
            $recipe = $this->connect_api($url);
            
            // shuffle $recipe
            $random_number = rand(0, count($recipe) - 1);
            
            $recipe[$random_number]->new_title = $this->get_recipe_name($recipe[$random_number]->key);

            return $recipe[$random_number];
        }

        public function get_recipe_detail($recipe_key)
        {   
            $url = API_URL . 'api/recipe/' . $recipe_key;

            $recipe_detail = $this->connect_api($url);

            if(!$recipe_detail)
            {
                return false;
            }

            $recipe_detail->new_title = $this->get_recipe_name($recipe_key);

            if(!(
                empty($recipe_detail->needItem) && 
                empty($recipe_detail->ingredient) &&
                empty($recipe_detail->step) &&
                $recipe_detail->new_title == 0
            ))
            {
                if(is_null($recipe_detail->thumb))
                {
                    $recipe_detail->thumb = base_url() . 'assets/img/image-not-found.png';
                }
            }
            return $recipe_detail;
        }
    }

?>