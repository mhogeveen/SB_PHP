<?php

// Submit post
function submit_post()
{
   // Required dependencies for front-end uploads
   require_once(ABSPATH . 'wp-admin/includes/image.php');
   require_once(ABSPATH . 'wp-admin/includes/file.php');
   require_once(ABSPATH . 'wp-admin/includes/media.php');

   // Create post object
   $new_post = array(
      'post_title' => $_POST['titleInput'],
      'post_content' => $_POST['messageInput'],
      'post_status' => 'publish',
      'tax_input' => array(
         'category' => $_POST['categoryInput'],
      )
   );

   // Insert post with new_post data
   $post_id = wp_insert_post($new_post);
   // Upload attachement from imageInput and create relationship with post_id
   $attachement_id = media_handle_upload('imageInput', $post_id);
   // Update thumbnail_id metadata to reflect attachement
   update_post_meta($post_id, '_thumbnail_id', $attachement_id);
   // Set category term
   wp_set_post_terms($post_id, $_POST['categoryInput'], 'category');

   if ($post_id) {
      wp_redirect(home_url());
      exit;
   }
};
