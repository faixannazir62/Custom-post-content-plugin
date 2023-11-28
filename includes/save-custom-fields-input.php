<?php
/**
 * The function `cpfn_save_custom_fields_input` is used to save the selected post ID and custom CSS input in
 * the post meta data.
 * 
 * @return The function does not explicitly return anything.
 */

function cpfn_save_custom_fields_input(){

    // Global post variable
     global $post;

    // Check if autosave
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }

    // Check if it's a revision
    if ( wp_is_post_revision( $post->ID ) ) {  
             return;
    }

    /** 
     * The code is updating the post meta data for the current post. 
     * It is saving the value of the custom CSS input field with the meta key 
     * 'cpfn_textarea_saved_css' and the selected post ID from the dropdown list with the meta key 
     * 'cpfn_selected_post_id'. The values are sanitized using the appropriate sanitization functions before saving them. 
     */ 

    // Update custom post css
    update_post_meta( $post->ID, 'cpfn_textarea_saved_css', sanitize_textarea_field( $_POST['cpfn_textarea_css_input'] ) );

    // Update selected post id
    update_post_meta( $post->ID, 'cpfn_selected_post_id', sanitize_text_field( $_POST['cpfn_selected_post_id'] ));

    // Excute the code if  'cpfn_selected_post_id' isset
    if ( ! empty( $_POST['cpfn_selected_post_id'] ) ){

        // unhook this function so it doesn't loop infinitely
        remove_action( 'save_post', 'cpfn_save_selected_post' );
        
        // Set custom post content to selected post
        cpfn_set_custom_post_content( $post->ID, $_POST['cpfn_selected_post_id'] );

        // re-hook this function
		add_action('save_post', 'cpfn_save_selected_post');

    }

}

add_action( 'save_post', 'cpfn_save_custom_fields_input' );