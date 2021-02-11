<?php

if(!class_exists('WP_CLI'))
return;
function update_data_from_external_api(){

      $response = wp_remote_get('https://jsonplaceholder.typicode.com/posts', $args );
      $response = json_encode($response); // Takes a mixed value and converts it to JSON string
      $data = json_decode($response); // Convert JSON string to PHP variable

      global $wp_version;

      $args = array(
      'timeout'     => 5,
      'redirection' => 5,
      'httpversion' => '1.0',
      'user-agent'  => 'WordPress/' . $wp_version . '; ' . home_url(),
      'blocking'    => true,
      'body'        => null,
      'compress'    => false,
      'decompress'  => true,
      'sslverify'   => false,
      'stream'      => false,
      'filename'    => null
      );

      foreach ($data as $item) {
          // Check if post exist allready in WP
          $existing_posts = get_posts( array('post_type' => 'post', 'numberposts' => -1) );
          $api_ids = array();
          foreach($existing_posts as $post) {
            $id = get_post_meta( $item->ID, 'api_id', true );
            array_push($api_ids, $id);
          }

          if(in_array($item->id, $api_ids )) {
            error_log('post allready exists');
          } else {

            // New post data object to set as a post
              $new_post = array(
                'post_type'     => 'post',
                'post_title'    => $item->title,
                'post_status'   => 'publish',
                'post_author'   => 1,
                'post_content'  => $item->body,
                'meta_input' => array(
                  'api_id' => $item->id,
              )
              );

              // Insert the post into the database
              wp_insert_post($new_post);
          }
      }
}

WP_CLI::add_command('jst-update-data', 'update_data_from_external_api');
