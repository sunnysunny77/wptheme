<?php
/* Template Name: front-page */
?>

<?php get_header(); ?>

    <main id="main" class="container">

        <h1> <?php the_title(); ?> </h1>
      
        <?php the_content() ?>

    </main>

<?php get_footer(); ?>