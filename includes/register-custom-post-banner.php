<?php 
/**
 * 
 * The function `cpbfn_register_custom_post_banner` 
 * registers a custom post type called "Banners" with
 * various labels and settings.
 * 
 * 
 */

// Resgister Custom post function
function cpbfn_register_custom_post_banner(){
          $labels = array(

                    'name'                  => __( 'Banners', 'cp-banner-fn' ),
                    'singular_name'         => __( 'Banner', 'cp-banner-fn' ),
                    'all_items'             => __( 'All Banners', 'cp-banner-fn' ),
                    'archives'              => __( 'Banners Archives', 'cp-banner-fn' ),
                    'items_list'            => __( 'Banners list', 'cp-banner-fn' ),
                    'new_item'              => __( 'New Banner', 'cp-banner-fn' ),
                    'add_new'               => __( 'Add Banner', 'cp-banner-fn' ),
                    'add_new_item'          => __( 'Add New Banner', 'cp-banner-fn' ),
                    'edit_item'             => __( 'Edit Banner', 'cp-banner-fn' ),
                    'view_item'             => __( 'View Banner', 'cp-banner-fn' ),
                    'view_items'            => __( 'View Banners', 'cp-banner-fn' ),
                    'Search_items'          => __( 'Search Banners', 'cp-banner-fn' ),
                    'not_found'             => __( 'No Banner found', 'cp-banner-fn' ),
                    'not_found_in_trash'    => __( 'No Banner found in trash', 'cp-banner-fn' ),
                    'parent_item_colon'     => __( 'parent Banner', 'cp-banner-fn' ),
                    'menu_name'             => __( 'Custom Banners', 'cp-banner-fn' ),

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
          register_post_type( 'cpbfn_banner', $args);
          
          // Remove custom fields
          remove_post_type_support( 'cpbfn_banner', 'custom-fields' );

}
add_action( 'init', 'cpbfn_register_custom_post_banner');