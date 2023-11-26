<?php
/**
 * 
 * The function `cpfn_load_text_domain()` 
 * is used to load the text domain for a plugin in PHP.
 * 
 */

// Load domain function
function cpfn_load_text_domain(){
          load_plugin_textdomain( 
                    'cp-content-fn', 
                    false, 
                    dirname( plugin_basename( __FILE__ ) ) . '/languages/' 
          );

}
add_action( 'plugin_loaded', 'cpfn_load_text_domain' );