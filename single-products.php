<?php get_header() ?>

    <main id="main" class="container sinlge-product py-11">

        <?php if (have_posts()) { ?>

            <?php while (have_posts()) { the_post(); ?>

                <?php

                    $classes = [
                        'd-flex',
                        'flex-column',
                        'product-card-small',
                    ];

                    $product_title = get_field("title");
                    $image         = get_field("image");
                    $description   = get_field("description");
                    $size          = get_field("size");
                    $price         = get_field("price");
                    
                ?>

                <?php if ($product_title) { ?>

                    <h2 class="product-title-small mb-11"><?php echo $product_title; ?></h2>

                <?php } ?>

                <article id="post-<?php the_ID(); ?>" <?php post_class($classes); ?>>

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

                    <div class="row">

                        <?php if ($image) { ?>

                            <div class="col-48 col-md-16 product-image">

                                <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>">

                            </div>

                        <?php } ?>

                        <?php if ($description) { ?>

                            <div class="col-48 col-md-28 product-description d-flex flex-column justify-content-center"><?php echo $description; ?></div>

                        <?php } ?>

                    </div>

                    <?php if ($size) { ?>

                        <p class="product-size">Size: <?php echo $size; ?></p>

                    <?php } ?>

                    <?php if ($price) { ?>

                        <p class="product-price">$<?php echo $price; ?></p>

                    <?php } ?>

                </article>

            <?php } ?>

        <?php } ?>

        <hr class="s-p-hr"/>

        <?php  get_template_part("template-parts/section", "contact-form"); ?> 
        
        <hr class="s-p-hr"/>

        <?php  get_template_part("template-parts/section", "cta"); ?> 

    </main>

<?php get_footer(); ?>