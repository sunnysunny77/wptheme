<?php
/* Template Name: products */

//Custom Post 
$products = new WP_Query(array(
	'post_type' => 'products',
	'post_status' => 'publish',
	'orderby' => 'date',
	'order' => 'DESC',
	'ignore_sticky_posts' => 1, // if you are missing a post check this
	'posts_per_page' => -1, // -1 for infinite results
));
wp_reset_query();
?>

<?php get_header(); ?>

    <main id="main" class="container py-11">

        <?php the_content(); ?>

        <div class="products-grid mt-9">

            <?php
                while ($products->have_posts()) { $products->the_post();

                    $product_title = get_field("title");
                    $image         = get_field("image");
                    $description   = get_field("description");
                    $size          = get_field("size");
                    $price         = get_field("price");
                ?>

                    <article class="product-card">

                        <a href="<?php the_permalink(); ?>" class="product-link">

                            <?php if ($image) { ?>

                                <div class="product-image">

                                    <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>">

                                </div>

                            <?php } ?>

                            <?php if ($product_title) { ?>

                                <h2 class="product-title"><?php echo $product_title; ?></h2>

                            <?php } ?>

                            <?php if ($description) { ?>

                                <div class="product-description"><?php echo $description; ?></div>

                            <?php } ?>

                            <?php if ($size) { ?>

                                <p class="product-size">Size: <?php echo $size; ?></p>

                            <?php } ?>

                            <?php if ($price) { ?>

                                <p class="product-price">$<?php echo $price; ?></p>

                            <?php } ?>

                            <b class="product-b">Order</b>

                        </a>

                    </article>

                <?php } 
            
            wp_reset_postdata(); ?>

        </div>

    </main>

<?php get_footer(); ?>