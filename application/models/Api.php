<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class Api extends CI_Model {
        public function get_today_recipe()
        {
            $url = API_URL . 'api/recipes';
            
            $json_data = file_get_contents($url);
            
            $response_data = json_decode($json_data);
            
            $recipe = $response_data->results;
            
            // shuffle $recipe
            $random_number = rand(0, count($recipe) - 1);
            
            $recipe[$random_number]->new_title = $this->get_recipe_name($recipe[$random_number]->key);

            foreach($recipe as $key => $value)
            {
                if($value == NULL)
                {
                    switch ($key)
                    {
                        case 'title':
                            $recipe[$random_number]->title = 'Resep Makanan';
                            break;
                        case 'new_title':
                            $recipe[$random_number]->new_title = 'Resep Makanan';
                            break;
                        case 'thumb':
                            $recipe[$random_number]->thumb = base_url() . 'assets/img/home-bg.jpg';
                          break;
                        case 'times':
                            $recipe[$random_number]->times = '30mnt - 1jam';
                            break;
                        case 'portion':
                            $recipe[$random_number]->portion = '4 Porsi';
                            break;
                        case 'dificulty':
                            $recipe[$random_number]->dificulty = 'Mudah';
                            break;
                    }
                }
            }
            
            return $recipe[$random_number];
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

        public function get_recipe_detail($recipe_key)
        {
            $url = API_URL . 'api/recipe/' . $recipe_key;

            $json_data = file_get_contents($url);

            $response_data = json_decode($json_data);

            $recipe_detail = $response_data->results;

            $recipe_detail->new_title = $this->get_recipe_name($recipe_key);

            return $recipe_detail;
        }
    }

?>