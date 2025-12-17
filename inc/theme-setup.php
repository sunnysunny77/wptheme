<?php

if (!isset($content_width)) {
    $content_width = 1920;
}

if (!function_exists('boot_setup')) {

    function boot_setup()
    {
        register_nav_menus(
            array(
            'main-nav' => 'Main Navigation',
            'footer-nav' => 'Footer Navigation',)
        );

        add_theme_support('widget-customizer');

        add_theme_support('custom-logo', array('height' => 100, 'width' => 100,  'unlink-homepage-logo' => true,  'header-text' => array('site-title', 'site-description')));

        add_theme_support('title-tag');

        add_theme_support('html5', ['script', 'style', 'comment-form', 'search-form', 'gallery', 'caption']);

        add_theme_support('menus');

        // add_theme_support('post-formats', array('aside', 'gallery', 'quote', 'image', 'video'));

        // add_theme_support('automatic-feed-links');

        add_theme_support('post-thumbnails');

        require_once get_template_directory() . '/inc/class-wp-bootstrap-navwalker.php';
    }
}
add_action('after_setup_theme', 'boot_setup');

function boot_scripts()
{
    wp_dequeue_style( 'wp-block-library' );

    wp_enqueue_style('app-style', get_template_directory_uri() . '/assets/css/app.min.css', '', null);

    wp_enqueue_script('app-scripts', get_template_directory_uri() . '/assets/js/app.min.js','', null, true);

    wp_enqueue_script('preload-script', get_template_directory_uri() . '/assets/js/preload.js','', null, false);

    wp_localize_script('app-scripts', 'frontend_ajax_object', array(
        'ajax_url' => admin_url( 'admin-ajax.php' )
    ));

    wp_localize_script('preload-script', 'preload_object', array(
        'root' => get_template_directory_uri() . '/assets',
    ));

}
add_action('wp_enqueue_scripts', 'boot_scripts');

function boot_post_limits($query)
{
    if (!is_admin() && $query->is_main_query()) {

        if (is_home()) {
            $query->set('posts_per_page', '2');
        }
    }
}
add_action('pre_get_posts', 'boot_post_limits');

function boot_session() {
    if ( ! session_id() ) {
        session_start();
    }
}
add_action( 'init', 'boot_session' );

function boot_on_theme_activation()
{

    function boot_remove_post($page_path, $output, $post_type)
    {

        $post = get_page_by_path($page_path, $output, $post_type);

        if ($post) {
            wp_delete_post($post->ID, true);
        }
    }

    //boot_remove_post('hello-world', 'OBJECT', 'post');

    boot_remove_post('Sample Page', 'OBJECT', 'page');

    boot_remove_post('Privacy Policy', 'OBJECT', 'page');

    if (!get_option('page_on_front')) {
        $page = array(
            'post_title'     => 'Home',
            'post_type'      => 'page',
            'post_name'      => 'home',
            'post_status'    => 'publish',
            'page_template'  => 'front-page.php',
        );
        $id = wp_insert_post($page);
        update_option('page_on_front', $id);
        update_option('show_on_front', 'page');
    }

    if (!get_option('page_for_posts')) {
        $page = array(
            'post_title'     => 'Blog',
            'post_type'      => 'page',
            'post_name'      => 'blog',
            'post_status'    => 'publish',
            'page_template'  => 'home.php',
        );
        $id = wp_insert_post($page);
        update_option('page_for_posts', $id);
    }

    if (!get_post_status(256)) {
        $page = array(
            'import_id'      =>  256,
            'post_title'     => 'Products',
            'post_type'      => 'page',
            'post_name'      => 'products',
            'post_status'    => 'publish',
            'page_template'  => 'page-product.php',
        );
        $id = wp_insert_post($page);
    }

    if (!get_post_status(259)) {
        $page = array(
            'import_id'      =>  259,
            'post_title'     => 'Contact',
            'post_type'      => 'page',
            'post_name'      => 'contact',
            'post_status'    => 'publish',
            'page_template'  => 'page-contact.php',
        );
        $id = wp_insert_post($page);
    }

	update_option( 'uploads_use_yearmonth_folders', 0 );
}
add_action('after_switch_theme', 'boot_on_theme_activation');

add_filter('show_admin_bar', '__return_false');

function boot_favicon(){
    echo "<link rel='shortcut icon' href='" . get_stylesheet_directory_uri() . "/favicon.ico' />" . "\n";
}
add_action( 'wp_head', 'boot_favicon');

function sync_acf_title_with_post_title( $post_id ) {
    if ( get_post_type( $post_id ) !== 'products' ) {
        return;
    }

    remove_action( 'save_post', 'sync_acf_title_with_post_title' );

    $post_title = get_the_title( $post_id );
    update_field( 'title', $post_title, $post_id );

    add_action( 'save_post', 'sync_acf_title_with_post_title' );
}
add_action( 'save_post', 'sync_acf_title_with_post_title' );

function sync_post_title_with_acf_title( $post_id ) {
    if ( get_post_type( $post_id ) !== 'products' ) {
        return;
    }

    $acf_title = get_field( 'title', $post_id );
    if ( $acf_title ) {
        remove_action( 'acf/save_post', 'sync_post_title_with_acf_title' );

        wp_update_post([
            'ID'         => $post_id,
            'post_title' => $acf_title,
        ]);

        add_action( 'acf/save_post', 'sync_post_title_with_acf_title', 20 );
    }
}
add_action( 'acf/save_post', 'sync_post_title_with_acf_title', 20 );

function add_defer_attribute($tag, $handle, $src) {

    $defer_scripts = array('app-scripts', 'preload-script', 'pwa-service-worker');

    if (in_array($handle, $defer_scripts)) {
        return '<script src="' . esc_url($src) . '" defer></script>';
    }

    return $tag;
}
add_filter('script_loader_tag', 'add_defer_attribute', 10, 3);
