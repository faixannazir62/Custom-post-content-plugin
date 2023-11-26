<?php 
/**
 * 
 * The function `cpfn_register_custom_post_content` 
 * registers a custom post type called "Content" with
 * various labels and settings.
 * 
 * 
 */

// Resgister Custom post function
function cpfn_register_custom_post_content(){
          $labels = array(

                    'name'                  => __( 'Content', 'cp-content-fn' ),
                    'singular_name'         => __( 'Content', 'cp-content-fn' ),
                    'all_items'             => __( 'All Content', 'cp-content-fn' ),
                    'archives'              => __( 'Content Archives', 'cp-content-fn' ),
                    'items_list'            => __( 'Content list', 'cp-content-fn' ),
                    'new_item'              => __( 'New Content', 'cp-content-fn' ),
                    'add_new'               => __( 'Add Content', 'cp-content-fn' ),
                    'add_new_item'          => __( 'Add New Content', 'cp-content-fn' ),
                    'edit_item'             => __( 'Edit Content', 'cp-content-fn' ),
                    'view_item'             => __( 'View Content', 'cp-content-fn' ),
                    'view_items'            => __( 'View Content', 'cp-content-fn' ),
                    'Search_items'          => __( 'Search Content', 'cp-content-fn' ),
                    'not_found'             => __( 'No Result found', 'cp-content-fn' ),
                    'not_found_in_trash'    => __( 'No Result found in trash', 'cp-content-fn' ),
                    'parent_item_colon'     => __( 'parent content', 'cp-content-fn' ),
                    'menu_name'             => __( 'Custom Content', 'cp-content-fn' ),

          );
          $args = array(

                    'labels'                => $labels,
                    'public'                => true,
                    'show_ui'               => true,
                    'supports'              => array( 'title', 'editor', 'author', 'revisions' ),
                    'has_archive'           => true,
                    'rewrite'               => true,
                    'query_var'             => true,
                    'menu_position'         => 23,
                    'menu_icon'             => 'dashicons-media-code',
                    
          );

          // Register post function
          register_post_type( 'cpfn_content', $args);
          
          // Remove custom fields
          remove_post_type_support( 'cpfn_content', 'custom-fields' );

}
add_action( 'init', 'cpfn_register_custom_post_content');