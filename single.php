<?php get_header() ?>

    <main id="main" class="container template py-11">

        <?php if (have_posts()) { ?>

            <?php while (have_posts()) { the_post(); ?>

                <?php

                    $classes = [
                        'd-flex',
                        'flex-column'
                    ];
                    
                ?>

                <section id="post-<?php the_ID(); ?>" <?php post_class($classes); ?>>

                    <h1 class="mb-7 text-center w-100"> <?php the_title(); ?></h1>      

                    <span class="d-block pb-3">

                        <?php echo get_the_date(); ?>

                    </span>

                    <?php 
                        if ( has_post_thumbnail() ) {
                            the_post_thumbnail('thumbnail', [
                                'class' => 'featured-image',
                                'alt'   => get_the_title()
                            ]);
                        }
                    ?> 
				
                    <span class="d-block pb-6 content">

                        <?php the_content(); ?>

                        <?php edit_post_link(); ?>

                        <?php if (get_previous_post_link() || get_next_post_link()) { ?>

                            <nav class="pagination d-flex justify-content-start">

                                <?php if (get_previous_post_link()) { ?>

                                    <div class="prev menu-item">

                                        <?php previous_post_link('%link', 'Previous'); ?>

                                    </div>

                                <?php } ?>

                                <?php if (get_previous_post_link() && get_next_post_link()) { ?>

                                    &nbsp; | &nbsp;

                                <?php } ?>

                                <?php if (get_next_post_link()) { ?>

                                    <div class="next menu-item">

                                        <?php next_post_link('%link', 'Next'); ?>

                                    </div>

                                <?php } ?>

                            </nav>

                        <?php } ?> 

                    </span>

                </section>

                <hr class="mb-3 mx-2"/>

                <?php if (comments_open() || get_comments_number()) {

                    comments_template();
                        
                } ?>

            <?php } ?>

        <?php } ?>

    </main>

<?php get_footer(); ?>