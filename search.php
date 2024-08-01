<?php get_header(); ?>

    <main id="main" class="container">

        <h1> 

            Search: &nbsp; <?php the_search_query() ?>
            
        </h1>

        <?php if (have_posts()) { ?>

            <?php while (have_posts()) { the_post(); ?>

                <?php if (has_post_thumbnail()) {  echo '<div role="img" aria-label="post_thumbnail" style="background-image: url(' . get_the_post_thumbnail_url() . ');"></div>'; } ?>

                <h2> 

                    <a href="<?php the_permalink() ?>">
                        
                        <?php the_title(); ?>
                        
                    </a>

                </h2>

                <br>

                <?php the_content() ?>

                <p>

                    Comments:

                    <?php comments_popup_link(); ?>

                </p>

            <?php } ?>

        <?php } else { ?>

            <p>

                <?php echo 'No results found for:'; ?> &nbsp; <?php echo get_search_query(); ?>

            </p>

        <?php } ?>

        <?php get_search_form(); ?>

    </main>

<?php get_footer(); ?>