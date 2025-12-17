<?php
/* Template Name: contact */
?>

<?php get_header(); ?>

    <main id="main" class="container py-11">

        <h1 class="text-center pb-11 contact-heading"><?php the_title(); ?></h1>

        <div class="row d-flex align-items-stretch pb-4">

            <div class="col-48 col-md-20 col-xl-16 d-flex bg-echo flex-grow-1 pt-4 px-4 pb-7 order-2 order-md-1">

                <?php the_content(); ?>

            </div>

            <div class="col-48 col-md-28 col-xl-32 flex-grow-1 order-1 order-md-2">

                <?php  get_template_part("template-parts/section", "contact-form"); ?> 

            </div>

        </div>
        
        <hr class="mt-6"/>

        <?php  get_template_part("template-parts/section", "cta"); ?> 
        
    </main>

<?php get_footer(); ?>