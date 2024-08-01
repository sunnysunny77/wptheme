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

                    <?php if (has_post_thumbnail()) { ?>

                        <div>

                            <?php the_post_thumbnail(); ?>

                        </div>
                        
                    <?php } ?>

                    <?php the_content() ?>

                    <?php edit_post_link(); ?>

                    <?php the_post_navigation(array(
                        'prev_text' => '← %title',
                        'next_text' => '→ %title',
                        'screen_reader_text' => 'Continue Reading',
                        )
                    );?>

                    <p>

                        By: &nbsp;
                        <?php the_author(); ?>
                        ,
                        <?php echo get_the_date(); ?>
                        
                    </p>

                    <?php the_category(); ?>

                    <?php if (the_tags()) { ?>
                        
                        <p>

                            <?php the_tags(); ?>

                        </p>

                    <?php } ?>

                    <?php if (comments_open() || get_comments_number()) {

                        comments_template();
                        
                    } ?>

                </section>

            <?php } ?>

        <?php } ?>

    </main>

<?php get_footer(); ?>