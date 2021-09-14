<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class Api extends CI_Model {
        public function connect_api($url)
        {
            $json_data = @file_get_contents($url);

            // return false if $json_data is null
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
            
            // cast $new_recipe_key from string to array with delimiter '-'
            $new_recipe_key_arr = explode('-', $new_recipe_key);

            // Upper case all string
            $temp = [];
            for($i = 0; $i < count($new_recipe_key_arr); $i++)
            {
                array_push($temp, ucfirst($new_recipe_key_arr[$i]));
            }
            
            // cast $temp from array to string with delimiter ' '
            $new_recipe_key = implode(' ', $temp);

            return $new_recipe_key;
        }

        public function get_today_recipe()
        {
            $url = API_URL . 'api/recipes';
            
            $recipe = $this->connect_api($url);
            
            // $random_number = rand(0, count($recipe) - 1);
            
            // $recipe[$random_number]->new_title = $this->get_recipe_name($recipe[$random_number]->key);

            // return $recipe[$random_number];

            // get first two recipes from api
            $idx = 0;
            $recipe[$idx]->new_title = $this->get_recipe_name($recipe[$idx]->key);

            return $recipe[$idx];
        }

        public function get_recipe_detail($recipe_key)
        {   
            $url = API_URL . 'api/recipe/' . $recipe_key;

            $recipe_detail = $this->connect_api($url);

            // return false if $recipe_detail is null
            if(!$recipe_detail)
            {
                return false;
            }

            $recipe_detail->new_title = $this->get_recipe_name($recipe_key);

            // change thumb to image-not-found.png if $recipe_detail->thumb is null
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

        public function get_recipe_per_page($page)
        {
            $url = API_URL . 'api/recipes/' . $page;
            
            $recipe_per_page = $this->connect_api($url);

            foreach($recipe_per_page as $recipe)
            {
                $recipe->new_title = $this->get_recipe_name($recipe->key);
            }

            return $recipe_per_page;
        }

		public function get_recipe_by_keyword($keyword)
		{
			$url = API_URL . '/api/search/?q=' . $keyword;

			$recipe_by_keyword = $this->connect_api($url);

			foreach($recipe_by_keyword as $recipe)
            {
                $recipe->new_title = $this->get_recipe_name($recipe->key);
            }

			return $recipe_by_keyword;
		}
    }
?>
