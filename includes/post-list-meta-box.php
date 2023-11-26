<?php
/**
 * 
 * This PHP function adds a meta box to a custom post type called "cpfn_content" and displays a
 * dropdown list of posts to select from.
 * 
 */

// Meta box callback hunction
function cpfn_custom_post_list_meta_box() {
    
    // The `add_meta_box` function is used to add a meta box to a custom post type
    add_meta_box(
        'custom-post-list-meta-box',
        __('Set Post', 'cp-content-fn'),
        'cpfn_custom_post_list_meta_box_content',
        'cpfn_content', 
        'normal',
        'default'
    );
}

// Add meta boxes hook
add_action( 'add_meta_boxes', 'cpfn_custom_post_list_meta_box' );

// Add meta box content  callback function
function cpfn_custom_post_list_meta_box_content( $post ) {

    $cpfn_selected_post_id = get_post_meta( $post->ID, 'cpfn_selected_post_id', true);

    $posts = get_posts( array(
        'post_type'      => 'post', 
        'posts_per_page' => -1,
    ));

    if ( $posts ) {
        
        echo '<label for="cpfn_select_label">' . esc_html__( 'Select a post: ', 'cp-content-fn' ) . '</label>';
        echo '<select name="cpfn_selected_post_id" id="cpfn_select_post_id">';
        echo '<option value="">' . esc_html__('Select a post', 'cp-content-fn') . '</option>';

        foreach ($posts as $post) {

            setup_postdata($post);

            echo '<option value="' . esc_attr($post->ID) . '" 
            ' . selected( $post->ID, $cpfn_selected_post_id, false ) . '>
            ' . esc_html( $post->post_title, 'cp-content-fn' ) . 
            '</option>';
        }

        echo '</select>';
        // Reset global post data
        wp_reset_postdata(); 
    } 

}

/**
 * 
 * The function `cpfn_save_selected_post` saves the selected post ID as post meta when a post is saved.
 * 
 */

function cpfn_save_selected_post( $post_id ){

    // Check 'cpfn_selected_post_id' isset
    if ( isset( $_POST['cpfn_selected_post_id'] ) ){

        // Update selected post id
        update_post_meta( $post_id, 'cpfn_selected_post_id', sanitize_text_field( $_POST['cpfn_selected_post_id'] ));
        
    }
}

add_action( 'save_post', 'cpfn_save_selected_post' );