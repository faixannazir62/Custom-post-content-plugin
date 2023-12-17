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
    $new_columns = array();

    foreach ($columns as $key => $value) {

        $new_columns[$key] = $value;

        // if key is equal to 'title' then Add 'Shortcode' column after the title column
        if ($key == 'title') {

            $new_columns['shortcode'] = __('Shortcode', 'cp-content-fn');

        }
    }
    // Return new columns list.
    return $new_columns;

}
add_filter('manage_cpfn_content_posts_columns', 'cpfn_add_shortcode_column');
