<?php get_header(); ?>

    <main id="main" class="container template">

        <?php if (have_posts()) { ?>

            <?php while (have_posts()) { the_post(); ?>

                <h1> <?php the_title(); ?></h1>

                <?php 
                    if ( has_post_thumbnail() ) {
                        the_post_thumbnail('thumbnail', [
                            'class' => 'featured-image',
                            'alt'   => get_the_title()
                        ]);
                    }
                ?>

                <?php the_content(); ?>

            <?php } ?>

        <?php } ?>

    </main>

<?php get_footer(); ?>