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

    wp_enqueue_style('app-style', get_template_directory_uri() . '/assets/css/app.min.css');

    wp_enqueue_script('app-scripts', get_template_directory_uri() . '/assets/js/app.min.js','', '', true);

    wp_localize_script('app-scripts', 'frontend_ajax_object', array(
        'ajax_url' => admin_url( 'admin-ajax.php' ),
        //'data_var_1' => 'test',
    ));
}
add_action('wp_enqueue_scripts', 'boot_scripts');

function boot_post_limits($query)
{
    if (!is_admin() && $query->is_main_query()) {

        if (is_home()) {
            $query->set('posts_per_page', '3');
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
            'post_name'      => 'Home',
            'post_status'    => 'publish',
            'page_template'  => 'front-page.php',
        );
        $id = wp_insert_post($page);
        update_option('page_on_front', $id);
        update_option('show_on_front', 'page');
    }

    if (!get_option('page_for_posts')) {
        $page = array(
            'post_title'     => 'Posts',
            'post_type'      => 'page',
            'post_name'      => 'Posts',
            'post_status'    => 'publish',
            'page_template'  => 'home.php',
        );
        $id = wp_insert_post($page);
        update_option('page_for_posts', $id);
    }

    if (!get_post_status(256)) {
        $page = array(
            'import_id'      =>  256,
            'post_title'     => 'Example',
            'post_type'      => 'page',
            'post_name'      => 'Example',
            'post_status'    => 'publish',
            'page_template'  => 'page-example.php',
        );
        $id = wp_insert_post($page);
    }

	update_option( 'uploads_use_yearmonth_folders', 0 );
}
add_action('after_switch_theme', 'boot_on_theme_activation');

add_filter( 'pre_option_upload_path', function( $upload_path ) {
    return  get_template_directory() . '/files' ;
});

add_filter( 'pre_option_upload_url_path', function( $upload_url_path ) {
    return get_template_directory_uri() . '/files';
});

function boot_custom_logo_output( $html ) {
	$html = str_replace('custom-logo-link', 'navbar-brand', $html );
	return $html;
}
add_filter('get_custom_logo', 'boot_custom_logo_output', 10);
