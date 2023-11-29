<?php
function cpfn_generate_post_shortcode() {

    // Use global $post to access the current post object
    global $post;

    // Check if $post is not null
    if ($post !== null) {

          // Get post  
          $cpfn_get_custom_post = get_post( $post->ID );

          $cpfn_cp_content_within_div = '<div class="cpfn_post_sc">' . $cpfn_get_custom_post->post_content .'</div>';  

          // Return post content
          return $cpfn_cp_content_within_div;
    }

   return 'Custom Post is not set';
}
add_shortcode( $cpfn_unique_shortcode_id, 'cpfn_generate_post_shortcode' );

