<?php

/**
 * 
 * The function `cpfn_apply_custom_css` applies custom CSS to specific pages based on the post type and
 * post meta data.
 * 
 */

function cpfn_apply_custom_css() {
    
    // Get the current post ID
    $cpfn_post_id = get_the_ID();
     
    // apply css to single page of 'cpfn_content' custom post 
    if( is_singular( 'cpfn_content' ) ) {

        // Get custom css
        $cpfn_custom_css = get_post_meta(  $cpfn_post_id, 'cpfn_textarea_saved_css', true);

        if( ! empty( $cpfn_custom_css ) ) {

            echo '<style id="cpfn-css">' . wp_strip_all_tags( $cpfn_custom_css ) . '</style>';

        }
    }

    // If it is other than this 'cpfn_content' custom post, then add custom css to the single page
    if( ! is_singular( 'cpfn_content' ) ) {
        
        // Get content post id
        $cpfn_post_content_id = get_post_meta( $cpfn_post_id, 'cpfn_content_post_id', true);

         // Get custom css by the content post id
        $cpfn_custom_css = get_post_meta( $cpfn_post_content_id, 'cpfn_textarea_saved_css', true);

        // Get select post id by the content post id
        $cpfn_selected_post_id = get_post_meta( $cpfn_post_content_id, 'cpfn_selected_post_id', true);


        // Apply css to selected post by id's
        if( ! empty( $cpfn_custom_css ) && ! empty( $cpfn_selected_post_id ) ) {

            echo '<style id="cpfn-css">' . wp_strip_all_tags( $cpfn_custom_css ) . '</style>';

        }

        // Apply css to shortcode content posts
        if ( ! empty( $cpfn_custom_css ) ){

             echo '<style id="cpfn-css">' . wp_strip_all_tags( $cpfn_custom_css ) . '</style>';

        }
    }
}
// Add CSS within the Head tag of single post
add_action( 'wp_head', 'cpfn_apply_custom_css' );

