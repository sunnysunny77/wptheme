
        <footer class="container-fluid py-8">

            <div class="px-8 row justify-content-between align-items-center">

                <?php if ( has_nav_menu( 'footer-nav' ) ) {
                    wp_nav_menu(
                        array(
                        'theme_location'    => 'footer-nav',
                        'depth'             => 2,
                        'container'         => 'div',
                        'container_class'   => 'col-48 col-md-auto order-1 order-md-2 d-flex flex-fill',
                        'container_id'      => 'footer-nav',
                        'fallback_cb'       => 'WP_Bootstrap_Navwalker::fallback',
                        'menu_class'        => 'd-flex flex-column flex-md-row p-0 m-md-0',
                        'walker'            => new WP_Bootstrap_Navwalker(),
                        )
                    );
                }?>

                <div class="col-48 col-md-auto d-flex order-2 order-md-1">

                    <?php

                        if (function_exists('the_custom_logo')) {

                            the_custom_logo();

                        }

                    ?>

                </div>

                <ul class="footer-right col-48 col-md-auto d-flex flex-column flex-fill align-items-end list-unstyled order-3">

                    <?php dynamic_sidebar("widget_one"); ?>

                    <li>

                        <i class="fa-regular fa-copyright"></i>

                        <?php echo date('Y'); ?>

                    </li>

                </ul>

            </div>
    
        </footer>

    </div>

</body>

<?php wp_footer(); ?>

</html>

