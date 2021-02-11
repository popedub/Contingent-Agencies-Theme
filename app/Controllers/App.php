<?php

namespace App\Controllers;

use Sober\Controller\Controller;
use GuzzleHttp\Client;
class App extends Controller
{
    protected $acf = true;

    public function siteName()
    {
        return get_bloginfo('name');
    }

    public static function title()
    {
        if (is_home()) {
            if ($home = get_option('page_for_posts', true)) {
                return get_the_title($home);
            }
            return __('Latest Posts', 'sage');
        }
        if (is_archive()) {
            if (is_category()) {
                return single_cat_title( '', false );
            } else return get_the_archive_title();
        }

        if (is_search()) {
            return sprintf(__('Search Results for %s', 'sage'), get_search_query());
        }
        if (is_404()) {
            return __('Not Found', 'sage');
        }

        if (!is_page()){
            return __('notation', 'sage');
        }
        else
        return get_the_title();
    }
    public static function api(){
        $token = '16515c03479c6d0a8514ab7b8c607ef53a9261df';
        // Create a client with a base URI
        //43F93B73237D499285666327D3804087
        $client = new Client(['base_uri' =>
        'https://basedev.uni-ak.ac.at/portfolio/api/v1/user/3F3920E1AF5D460E98310ABEFA0DDA8B/']);
        $client_single = new Client(['base_uri' =>
        'https://basedev.uni-ak.ac.at/portfolio/api/v1/user/3F3920E1AF5D460E98310ABEFA0DDA8B/data/']);
        $headers = [
        'Authorization' => 'Bearer ' . $token,
        'Accept' => 'application/json',
        ];
        $response = $client->request('GET', 'data', [
        'headers' => $headers
        ]);
        $result = json_decode($response->getBody());
        foreach ($result->data as $item) {
        foreach($item->data as $post_api){
        // Check if post exist allready in WP
        $existing_posts = get_posts( array('post_type' => 'post', 'numberposts' => -1) );
        $api_ids = array();

        foreach($existing_posts as $post) {
        $id = get_post_meta( $post->ID, 'api_id', true );
        array_push($api_ids, $id);
        }


        if(in_array($post_api->id, $api_ids )) {
        error_log('post allready exists');
        } else {
        if (strcmp($post_api->title[0], 'R') == 0 || strcmp($post_api->title[0], 'N') == 0 ) {
            $tag = 'notation';
        } else {
            $tag = 'thing';
        }
        // New post data object to set as a post
        $new_post = array(
        'post_type' => 'post',
        'post_title' => $post_api->title,
        'post_status' => 'publish',
        'post_author' => 1,
        'tags_input' => $tag,
        'meta_input' => array(
        'api_id' => $post_api->id,
        )
        );

        // Insert the post into the database
        wp_insert_post($new_post);
        }
        }

        }
            foreach ($result->data as $data) {
            $data = $data->data;



                for ($i=0; $i < count($data); $i++) {


                    $id = $data[$i]->id;

                    // aqui entramos a la entrada individual para ver si está marcada como destacada
                    $response_single = $client_single->request('GET', $id, [
                    'headers' => $headers
                    ]);

                    $result_single = json_decode($response_single->getBody());
                    $posts[] = $result_single;


                }

            }
        return $posts;
    }

}
