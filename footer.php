    <?php 

        //Custom Post 
        $products = new WP_Query(array(
            'post_type' => 'products',
            'post_status' => 'publish',
            'orderby' => 'date',
            'order' => 'DESC',
            'ignore_sticky_posts' => 1, // if you are missing a post check this
            'posts_per_page' => 20, // -1 for infinite results
        ));
        wp_reset_query();

    ?> 
    
    <footer class="container d-flex flex-wrap justify-content-between">
    
        <?php if ( has_nav_menu( 'footer-nav' ) ) {
            wp_nav_menu(array(
                'theme_location'    => 'footer-nav',
                'depth'             => 2,
                'container'         => 'ul',
                'container_id'      => 'footer-nav',
                'menu_class'        => 'col-48 col-sm-24 list-unstyled',
                'items_wrap' => '<ul id="%1$s" class="%2$s"><li>links</li>%3$s</ul>'
                )
            ); 
        }?>

        <ul class="col-48 col-sm-24 col-lg-16 text-end list-unstyled">

            <li>

                <i class="fa-regular fa-copyright"></i>

            </li>

            <li>

                Products
                
            </li>

            <?php

                while ($products->have_posts()) { $products->the_post();

                    ?>

                        <li>
                            
                            <a href="<?php the_permalink() ?>">
                                
                                <?php the_title(); ?>
                                
                            </a>

                        </li>

                    <?php
                }
            ?>

            <?php dynamic_sidebar("widget_one"); ?>

	    </ul>
  
    </footer>

    <?php wp_footer(); ?>
    
</body>

</html>

