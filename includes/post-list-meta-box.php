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
        'cpfn_custom-post-list-meta-box',
        __('Custom Post Content Settings', 'cp-content-fn'),
        'cpfn_custom_post_list_meta_box_content',
        'cpfn_content', 
        'normal',
        'default'
    );
}

// Add meta boxes hook
add_action( 'add_meta_boxes', 'cpfn_custom_post_list_meta_box' );

// Add meta box content  callback function
function cpfn_custom_post_list_meta_box_content() {

    // Global post variable
    global $post;
    
    // Fetch the saved selected post id 
    $cpfn_selected_post_id = get_post_meta( $post->ID, 'cpfn_selected_post_id', true);

    // Fetch the textarea saved post css
    $cpfn_textarea_saved_css = get_post_meta( $post->ID, 'cpfn_textarea_saved_css', true);

    $cpfn_already_posted_posts = get_posts( array(
        'post_type'      => 'post', 
        'posts_per_page' => -1,
    ));

    if ( $cpfn_already_posted_posts ) {

        echo '<div class="cpfn_select_field_box cpfn_padding cpfn_margin cpfn_flex">';
        
        echo '<label for="cpfn_select_label" class="cpfn_sf_label">' 
        . esc_html__( 'Select a post: ', 'cp-content-fn' ) . '</label>';

        echo '<select name="cpfn_selected_post_id" id="cpfn_select_post_id">';

        echo '<option value="">' . esc_html__( 'Select a post', 'cp-content-fn' ) . '</option>';

        foreach ( $cpfn_already_posted_posts as $cpfn_already_posted_post) {

            setup_postdata($cpfn_already_posted_post);

            echo '<option value="' . esc_attr($cpfn_already_posted_post->ID) . '" 
            ' . selected( $cpfn_already_posted_post->ID, $cpfn_selected_post_id, false ) . '>
            ' . esc_html__( $cpfn_already_posted_post->post_title, 'cp-content-fn' ) . 
            '</option>';
        }

        echo '</select>';

        echo '</div>';

        // Reset global post data
        wp_reset_postdata(); 
    }

    // Textare field for custom post css 
    echo '<div class="cpfn_css_field_box cpfn_padding cpfn_margin cpfn_flex">';

    echo '<label for="cpfn_textarea_post_label" class="cpfn_cp_css_label">' 
    .  esc_html__( 'Add Content CSS:', 'cp-content-fn' ) . '</label>';

    echo '<textarea name="cpfn_textarea_css_input" id="cpfn_textarea_css_input" class="cpfn_textarea_cp_css" placeholder="' 
    .  esc_attr( __('Add CSS here...', 'cp-content-fn') ) . '">' 
    . esc_textarea( $cpfn_textarea_saved_css ) . '</textarea>';

    echo '</div>';
}