<?php

function boot_cptui_register_my_cpts()
{

    $labels = [
        "name" => __("products", "custom-post-type-ui"),
        "singular_name" => __("product", "custom-post-type-ui"),
    ];

    $args = [
        "label" => __("products", "custom-post-type-ui"),
        "labels" => $labels,
        "description" => "products",
        "public" => true,
        "publicly_queryable" => true,
        "show_ui" => true,
        "show_in_rest" => true,
        "rest_base" => "",
        "rest_controller_class" => "WP_REST_Posts_Controller",
        "has_archive" => false,
        "show_in_menu" => true,
        "show_in_nav_menus" => true,
        "delete_with_user" => false,
        "exclude_from_search" => false,
        "capability_type" => "post",
        "map_meta_cap" => true,
        "hierarchical" => false,
        "can_export" => false,
        "rewrite" => ["slug" => "products", "with_front" => true],
        "query_var" => true,
        "supports" => ["title"],
        "menu_icon" => "dashicons-products",
        "show_in_graphql" => false,
    ];
    register_post_type("products", $args);
}
add_action('init', 'boot_cptui_register_my_cpts');
