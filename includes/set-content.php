<?php
function cpfn_set_custom_post_content( $post_id, $selected_post_id ){

    // Update the content of the selected post
    if ( $selected_post_id && $post_id ) {

        // Get the content of selected post
        $cpfn_selected_post = get_post( $selected_post_id );

        // Get content of custom post content
        $cpfn_custom_post_content = get_post( $post_id );

        // Check if both posts exist
        if ( $cpfn_selected_post &&  $cpfn_custom_post_content ){

            // Add Html tags
            $cpfn_withtag_cp_content = '<div class="cpfn_content">' . $cpfn_custom_post_content->post_content . '</div>';

            // Condition is checking if the custom post content is already present in the selected post's content. 
            if ( strpos( $cpfn_selected_post->post_content, $cpfn_withtag_cp_content ) === false ){

                // If not, append the new content
                $cpfn_updated_sp_content = $cpfn_selected_post->post_content . $cpfn_withtag_cp_content;

                // Prepare the post data to be updated
                $cpfn_post_data = array(
                    'ID'           => $selected_post_id,
                    'post_content' => $cpfn_updated_sp_content,
                );

                // Update the post
                wp_update_post( $cpfn_post_data );
                
            }
        }
    }
}
