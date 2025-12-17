<?php get_header() ?>

	<main id="main" class="container template py-11">

		<h1 class="pb-8 text-center"> <?php the_archive_title(); ?></h1>

		<?php if (have_posts()) { ?>

			<?php while (have_posts())  { the_post(); ?>

				<h2 class="mb-7 text-center w-100"> 
					
					<a class="menu-item"href="<?php the_permalink(); ?>"> 

						<?php the_title(); ?> 

					</a>
					
				</h2>

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

				</span>

				<hr class="mb-3 mx-2"/>

				<?php if (has_category()) { ?>

					<span class="d-block pb-2 ms-3">

						Categories:

						<span class="menu-item">

							<?php the_category(); ?>

						</span>

					</span>

				<?php } ?>

				<?php if (has_tag()) { ?>

					<span class="d-block pb-2 ms-3">

						Tags:

						<span class="menu-item">

							<?php the_tags('', ', ', ''); ?>

						</span>

					</span>

				<?php } ?>

				<span class="d-block pb-2 ms-3">

					Comments:

					<span class="menu-item"> 

						<?php comments_popup_link(); ?>

					</span>

				</span>

			<?php } ?>

		<?php } ?>

	</main>

<?php get_footer(); ?>