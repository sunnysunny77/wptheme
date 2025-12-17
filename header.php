<!DOCTYPE html>
<html lang="en" data-overlayscrollbars-initialize>

<head>
    <meta charset="utf-8">
    <meta name="description" content="Bootstrap Wordpress theme">
    <meta name="keywords" content="Bootstrap, Wordpress">
    <meta name="author" content="D.C">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_title('', false); ?>
    <?php wp_head(); ?>
</head>

<body class="elementor-kit-257">

    <div data-overlayscrollbars-initialize id="site">

        <header>

            <nav class="navbar navbar-expand-sm" aria-label="">

                <div class="container-fluid">

                    <div class="row justify-content-between w-100">

                        <div class="col-auto">

                            <?php

                            if (function_exists('the_custom_logo')) {

                                the_custom_logo();
                            }

                            ?>

                        </div>

                        <div class="col-auto d-flex align-items-center">

                            <div class="navbar-toggler collapsed mx-5" role="button" data-bs-toggle="collapse" data-bs-target="#main-nav" aria-controls="main-nav" aria-expanded="false" aria-label="Toggle navigation">

                                <div>

                                    <div class="slider_8-bar1"></div>
                                    <div class="slider_8-bar2"></div>
                                    <div class="slider_8-bar3"></div>

                                </div>

                            </div>

                        </div>

                        <?php wp_nav_menu(
                            array(
                                'theme_location'    => 'main-nav',
                                'depth'             => 2,
                                'container'         => 'div',
                                'container_class'   => 'collapse navbar-collapse col-48 col-sm-auto flex-fill justify-content-center',
                                'container_id'      => 'main-nav',
                                'fallback_cb'       => 'WP_Bootstrap_Navwalker::fallback',
                                'menu_class'        => 'd-flex flex-column flex-sm-row align-items-end align-items-sm-center p-0 m-sm-0',
                                'walker'            => new WP_Bootstrap_Navwalker(),
                            )
                        );?>

                    </div>

                </div>

            </nav>

        </header>
