<?php

function boot_custom_sidebars()
{
    register_sidebar(
        array(
            'name' => 'widget one',
            'id' => 'widget_one',
            'before_widget' => '<li id="%1$s" class="widget %2$s">',
			'after_widget'  => '</li>',
			'before_title'  => '<h3 class="widgettitle">',
			'after_title'   => '</h3>',
        )
    );

    register_sidebar(
        array(
            'name' => 'widget cta',
            'id' => 'widget_cta',
            'before_widget' => '<li id="%1$s" class="widget %2$s">',
			'after_widget'  => '</li>',
			'before_title'  => '<h3 class="widgettitle">',
			'after_title'   => '</h3>',
        )
    );
}
add_action('widgets_init', 'boot_custom_sidebars');
