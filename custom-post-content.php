<?php
/**
 * Plugin Name:     Custom Post Content
 * Plugin URI:      https://www.custompostcontent.com
 * Description:     Create a custom content for single post
 * Version:         1.0.0
 * Author:          Faizan Nazir
 * Author URI:      https://www.faizannazir.com
 * Text Domain:     cp-content-fn
 * Domain Path:     /languages
*/

// No directly access
if ( ! defined ( 'ABSPATH' )) {
          exit;
}

// including other php files
include_once( plugin_dir_path( __FILE__ ) . 'includes/text-domain.php' );
include_once( plugin_dir_path( __FILE__ ) . 'includes/register-custom-post-content.php' );
include_once( plugin_dir_path( __FILE__ ) . 'includes/post-list-meta-box.php' );
include_once( plugin_dir_path( __FILE__ ) . 'includes/save-custom-fields-input.php' );
include_once( plugin_dir_path( __FILE__ ) . 'includes/set-content.php' );
include_once( plugin_dir_path( __FILE__ ) . 'includes/set-meta-field-css.php' );
include_once( plugin_dir_path( __FILE__ ) . 'includes/manage_columns.php' );
include_once( plugin_dir_path( __FILE__ ) . 'includes/generate_post_shortcode.php' );


/**
 * 
 * The function `cpfn_enqueue_scripts` enqueues a CSS file if the current post type is equal to
 * 'cpfn_content' in the WordPress admin area.
 * 
 */
function cpfn_enqueue_scripts(){

          global $post_type;

          // Checkif the current post type is equal to 'cpfn_content'. If it is, then  enqueue a CSS file
          if( 'cpfn_content' === $post_type ){
                    // Enqueue CSS file
                    wp_enqueue_style( 'cpfn-meta-box-styles', plugin_dir_url( __FILE__ ) . 'admin/css/admin-styles-cpfn.css' );
          }
          

}
add_action( 'admin_enqueue_scripts', 'cpfn_enqueue_scripts');