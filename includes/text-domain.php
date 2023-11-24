<?php

// Load text domain
function pcbfn_load_text_domain(){
          load_plugin_textdomain( 
                    'cp-banner-fn', 
                    false, 
                    dirname( plugin_basename( __FILE__ ) ) . '/languages/' 
          );

}
add_action( 'plugin_loaded', 'pcbfn_load_text_domain' );