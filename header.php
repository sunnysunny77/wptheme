<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="description" content="Bootstrap Wordpress theme">
    <meta name="keywords" content="Bootstrap, Wordpress">
    <meta name="author" content="D.C">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_title('', false); ?>
    <?php wp_head(); ?>
</head>

<body>

    <header>

        <nav class="navbar navbar-expand-sm" aria-label="">

            <div class="container">

                <?php

                if (function_exists('the_custom_logo')) {

                    the_custom_logo();
                }

                ?>

                <div class="navbar-toggler collapsed" role="button" data-bs-toggle="collapse" data-bs-target="#main-nav" aria-controls="main-nav" aria-expanded="false" aria-label="Toggle navigation">
                    
                    <div>

                        <div class="slider_8-bar1"></div>
                        <div class="slider_8-bar2"></div>
                        <div class="slider_8-bar3"></div>

                    </div>

                </div>

                <?php wp_nav_menu(array(
                        'theme_location'    => 'main-nav',
                        'depth'             => 2,
                        'container'         => 'div',
                        'container_class'   => 'collapse navbar-collapse',
                        'container_id'      => 'main-nav',
                        'menu_class'        => 'navbar-nav',
                        'fallback_cb'       => 'WP_Bootstrap_Navwalker::fallback',
                        'walker'            => new WP_Bootstrap_Navwalker(),
                    )
                );?>

            </div>
            
        </nav>

    </header>
