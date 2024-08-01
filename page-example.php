<?php
/* Template Name: example */

//Custom Feilds
$example = get_field("example");

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

<?php get_header(); ?>

    <main id="main" class="container">

        <?php the_content() ?>

        <?php
            if ($example) {
                ?>

                    <p> Feild: <?php echo $example; ?> </p>

                <?php
            }
        ?>

        <?php
            while ($products->have_posts()) { $products->the_post();

                $product_title = get_the_title();
                $product = get_field("product");

                ?>

                    <?php
                        if ($product_title) {
                            ?>

                                <p>  Product Title: <?php echo $product_title; ?> </p>

                            <?php
                        }
                    ?>

                     <?php
                        if ($product) {
                            ?>

                                <p> Product: <?php echo $product; ?> </p>

                            <?php
                        }
                    ?>
            
                <?php 
            }       
        ?> 
        
        <?php  get_template_part("template-parts/section", "contact-form"); ?> 
        
    </main>

<?php get_footer(); ?>