<?php
/**
 * The function `cpfn_generate_shortcode` generates a shortcode that displays the content of a specific
 * post.
 * 
 * @param atts The `` parameter is an array that contains the attributes passed to the shortcode.
 * In this case, the shortcode accepts two attributes:
 * 
 * @return The function `cpfn_generate_shortcode` returns the post content of a post with the specified
 * ID, wrapped in a `<div>` element with a class of `cpfn_content_{post ID}`. If the post is not found
 * or not published, it returns the string "Post not found."
 */
function cpfn_generate_shortcode( $atts ){

          // Add two attributes post id and the post type
          $atts = shortcode_atts( array(

                    'id' => '',
                    'post_type' => 'cpfn_content',
                    
          ), $atts );

          // Check attribute id is not empty
          if ( ! empty( $atts['id'] )){

                    // Get the post by ID and post type
                    $cpfn_post = get_post( $atts['id'], OBJECT, $atts['post_type'] );

                    // Check post is not Null and post status should be published
                    if ( $cpfn_post && $cpfn_post->post_status === 'publish' ){

                              // Return post content wrapped in HTML div tag with a class attribute
                              return '<div class="cpfn_content_'. esc_attr( $cpfn_post->ID ) . '">
                              ' . $cpfn_post->post_content . '</div>';
                    }      
          }
          // Return post not found
          return 'Post not found.';

}
add_shortcode( 'cpfn', 'cpfn_generate_shortcode' );