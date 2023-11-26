<?php
/**
 * 
 * This PHP function adds a meta box to a custom post type called "cpbfn_banner" and displays a
 * dropdown list of posts to select from.
 * 
 */

// Meta box callback hunction
function cpbfn_custom_post_list_meta_box() {
    
    // The `add_meta_box` function is used to add a meta box to a custom post type
    add_meta_box(
        'custom-post-list-meta-box',
        __('Set Banner on Post', 'cp-banner-fn'),
        'cpbfn_custom_post_list_meta_box_content',
        'cpbfn_banner', 
        'normal',
        'default'
    );
}

// Add meta boxes hook
add_action( 'add_meta_boxes', 'cpbfn_custom_post_list_meta_box' );

// Add meta box content  callback function
function cpbfn_custom_post_list_meta_box_content( $post ) {

     $posts = get_posts(array(
        'post_type'      => 'post', 
        'posts_per_page' => -1,
    ));

    if ( $posts ) {
        
        echo '<label for="related_post_id">' . esc_html__( 'Select a post: ', 'cp-banner-fn' ) . '</label>';
        echo '<select name="related_post_id" id="related_post_id">';
        echo '<option value="">' . esc_html__('Select a post', 'cp-banner-fn') . '</option>';

        foreach ($posts as $post) {

            setup_postdata($post);

            echo '<option value="' . esc_attr($post->ID) . '">' . esc_html( $post->post_title, 'cp-banner-fn' ) . '</option>';
        }

        echo '</select>';
        // Reset global post data
        wp_reset_postdata(); 
    } 
}