<?php

function boot_register_manifest() {   
    echo '<link rel="manifest" href="'.get_template_directory_uri().'/manifest.json">';
    echo '<link rel="apple-touch-icon" href="'.get_template_directory_uri().'assets/images/pwa-logo-small.webp">';
}
add_action( 'wp_head', 'boot_register_manifest' );
