<?php
/**
 * The function `cpfn_add_shortcode_column` adds a new column called "Shortcode" to the list of columns
 * in the WordPress admin for managing custom post type "cpfn_content".
 * 
 * @param columns The "columns" parameter is an array that contains the existing columns in the post
 * list table. Each key-value pair represents a column, where the key is the column identifier and the
 * value is the column label.
 * 
 * @return an array of columns with an added column for "Shortcode".
 */

function cpfn_add_shortcode_column( $columns ) {

    // Create empty array
    $cpfn_new_columns = array();

    foreach ($columns as $key => $value) {

        $cpfn_new_columns[$key] = $value;

        // if key is equal to 'title' then Add 'Shortcode' column after the title column
        if ($key == 'title') {

            $cpfn_new_columns['shortcode'] = __('Shortcode', 'cp-content-fn');

        }
    }
    // Return new columns list.
    return $cpfn_new_columns;

}
add_filter('manage_cpfn_content_posts_columns', 'cpfn_add_shortcode_column');

/**
 * The function `cpfn_display_shortcode` is used to display a shortcode for a custom post type in the
 * admin column.
 * 
 * @param column The  parameter is the name of the column in the post list table where the
 * shortcode will be displayed. In this case, it is 'shortcode'.
 * @param post_id The post ID is the unique identifier for a specific post in WordPress. It is used to
 * retrieve and manipulate data associated with that post. In this case, the post ID is passed as a
 * parameter to the `cpfn_display_shortcode` function to get the post title and generate a shortcode
 * based on it
 */
function cpfn_display_shortcode( $column, $post_id){

    if ( $column == 'shortcode' ){

         $cpfn_post_title = get_the_title($post_id);

         $cpfn_shortcode = '[cpfn title="' . esc_attr($cpfn_post_title) . '"]';

          echo '<input type="text" readonly="readonly" value="' . esc_attr( $cpfn_shortcode) . 
          '" class="cpfn-shortcode-input" onclick="this.select();" />';
    }

}
add_action( 'manage_cpfn_content_posts_custom_column', 'cpfn_display_shortcode', 10, 2);
