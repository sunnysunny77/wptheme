<?php

//note:  Service-Worker-Allowed header reuqired eg:  add_header Service-Worker-Allowed "/"; for nginx, or move worker.js to wordpress root and adjust 'root' => get_site_url(),
function boot_register_service_worker()
{

    wp_enqueue_script('pwa-service-worker', get_template_directory_uri() . '/assets/js/service-worker.js','', null, false);

    wp_localize_script('pwa-service-worker', 'pwa_object', array(
        'root' => get_template_directory_uri(),
    ));

}
add_action('wp_enqueue_scripts', 'boot_register_service_worker');