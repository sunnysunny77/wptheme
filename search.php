<?php get_header(); ?>

    <main id="main" class="container template py-11">

        <h1 class="text-center pb-8"> 

            Search: &nbsp; <?php the_search_query() ?>
            
        </h1>

        <?php

            $search_term = get_search_query();

            $args_products = [
                'post_type'      => ['products'],
                'posts_per_page' => -1,
                'meta_query' => [
                    'relation' => 'OR',
                    [
                        'key'     => 'title',
                        'value'   => $search_term,
                        'compare' => 'LIKE',
                    ],
                    [
                        'key'     => 'description',
                        'value'   => $search_term,
                        'compare' => 'LIKE',
                    ],
                    [
                        'key'     => 'size',
                        'value'   => $search_term,
                        'compare' => 'LIKE',
                    ],
                    [
                        'key'     => 'price',
                        'value'   => $search_term,
                        'compare' => 'LIKE',
                    ],
                ],
            ];

            $search_query_products = new WP_Query($args_products);

            if ($search_query_products->have_posts())  {

                while ($search_query_products->have_posts()) { 
                    
                        $search_query_products->the_post();   
                        $title         = get_field("title");
                        $image         = get_field("image");
                        $description   = get_field("description");
                        $size          = get_field("size");
                        $price         = get_field("price");
                      
                    ?>

                    <?php if ($title) { ?>

                        <h2 class="w-100"> 

                            <a class="menu-item" href="<?php the_permalink() ?>">
                                
                                <?php echo $title; ?>
                                
                            </a>

                        </h2>

                    <?php } ?>

                    <?php if ($image) { ?>

                        <img src="<?php echo $image["url"]; ?>" alt="<?php echo $image["alt"]; ?>" />

                    <?php } ?>
                    
                    <span class="d-block pb-7 content">

                        <?php if ($description) { ?>

                            <div><?php echo $description; ?></div>

                        <?php } ?>

                        <?php if ($size) { ?>

                            <p> Size: <?php echo $size; ?></p>

                        <?php } ?>

                        <?php if ($price) { ?>

                            <p >$<?php echo $price; ?></p>

                        <?php } ?>

                    </span>

                    <hr class="mb-9 mx-2"/>

                <?php } wp_reset_postdata();

            }  else { ?>

                <p class="mb-4 pb-6">No posts found.</p>

                <hr class="mb-6 mx-2"/>

        <?php } ?>

        <?php get_search_form(); ?>

    </main>

<?php get_footer(); ?>