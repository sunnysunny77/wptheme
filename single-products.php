<?php get_header() ?>

    <main id="main" class="container">

        <?php if (have_posts()) { ?>

            <?php while (have_posts()) { the_post(); ?>

                <?php

                    $classes = [
                        'd-flex',
                        'flex-column'
                    ];
                    
                ?>

                <section id="post-<?php the_ID(); ?>" <?php post_class($classes); ?>>

                    <h1><?php the_title(); ?></h1>

                    <?php echo get_the_date(); ?>

                    <?php the_time(); ?>

                    <?php the_author(); ?><br />

                    <?php edit_post_link(); ?>

                    <?php the_post_navigation(array(
                        'prev_text' => '← %title',
                        'next_text' => '→ %title',
                        'screen_reader_text' => 'Continue Reading',
                        )
                    );?>

                    <?php echo get_field("product"); ?>

                    <p>

                        By: &nbsp;
                        <?php the_author(); ?>
                        ,
                        <?php echo get_the_date(); ?>
                        
                    </p>

                </section>

            <?php } ?>

        <?php } ?>

    </main>

<?php get_footer(); ?>