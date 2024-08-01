<?php

function boot_register_my_service_worker() {   
    echo '<link rel="manifest" href="'.get_template_directory_uri().'/manifest.json">';
    echo '<link rel="apple-touch-icon" href="'.get_template_directory_uri().'assets/images/pwa-logo-small.png">';
    echo '<script>navigator.serviceWorker.register("'.get_template_directory_uri().'/service-worker.js")</script>';
}
add_action( 'wp_head', 'boot_register_my_service_worker' );