<?php if (have_comments()) { ?>

	<ul class="comment-list pb-8">

		<?php
			
			wp_list_comments([
				'style'       => 'ul',
				'short_ping'  => true,
				'avatar_size' => 0,
				'reply_text'  => 'Reply',
				'type'        => 'comment',
				'callback'    => function ($comment, $args, $depth) {

					$GLOBALS['comment'] = $comment;

					?>

					<li <?php comment_class(); ?> id="comment-<?php comment_ID(); ?>">

						<div class="comment-meta row">

							<div class="col-48 ms-3">

								<p class="comment-heading">

									<?php if ($comment->comment_parent) { ?>

										<span class="ms-4">

											<?php comment_author(); ?>

										</span>

									<?php } else {

										comment_author();

									} ?>

								</p>

							</div>

							<div class="comment-content col-36 ms-5">


									<?php if ($comment->comment_parent) { ?>

										<div class="ms-4">

											<?php comment_text(); ?>

										</div>

									<?php } else {

										comment_text();

									} ?>

							</div>

						</div>

						<div class="comment-reply w-100 text-end my-3">

							<span class="menu-item me-9">

								<?php

									comment_reply_link(array_merge($args, [
										'depth'     => $depth,
										'max_depth' => $args['max_depth']
									]));

								?>

							</span>

							<hr class="mt-3 mx-2"/>

						</div>

					</li>

					<?php
				},
			]);

		?>

	</ul>

<?php } ?>


<?php comment_form(
	$args = array(
		'id_form'           	=> 'commentform',
		'title_reply_before'   	=> '<h2 id="reply-title" class="comment-reply-title text-center">',
		'title_reply_after'    	=> '</h2>',
		'title_reply'       	=> 'Leave a Comment',
		'title_reply_to'    	=> 'Leave a Comment to %s',
		'cancel_reply_link'		=> 'Cancel Comment',
		'comment_notes_before'  => '<p class="r-feilds">Required fields are marked <span class="required">*</span></p>',
		'comment_field' 		=> '<p><label class="t-area-label" for="comment"><span class="required">*</span><span class="d-none">Comment</span></label><textarea placeholder="Start typing..." id="comment" name="comment" rows="8" required aria-required="true"></textarea></p>',
		'comment_notes_after'	=> '<p class="form-allowed-tags">' .
										'You may use these <abbr title="HyperText Markup Language">HTML</abbr> tags and attributes:' .
										'</p><p class="alert alert-info">' . allowed_tags() . 
								'</p>',
		'fields' 				=> array(
			'author' 			=> '<p class="comment-form-author"><label for="author"><span class="required">*</span><span class="d-none">Author</span></label><input id="author" name="author" required aria-required="true" placeholder="Name"></p>',
			'email' 			=> '<p class="comment-form-email"><label for="email"><span class="required">*</span><span class="d-none">Email</span></label><input id="email" name="email" required aria-required="true" placeholder="E-Mail"></p>',
			'url' 				=> '<p class="comment-form-url"><label class="d-none" for="url">Website</label><input id="url" name="url" placeholder="Website"></p>',
			'cookies' 			=> '<p class="comment-form-cookies"><input id="cookies" type="checkbox"><label for="cookies">Save my name, email, and website in this browser for the next time I comment.</label></p>' ,
		),
		'id_submit'     		=> 'commentsubmit',
		'logged_in_as' 			=> sprintf(
			'<p class="logged-in-as">
				You are commenting as <strong>%s</strong>.
				<a class="menu-item" href="%s">Log out</a>
			</p>
			<p class="r-feilds">Required fields are marked <span class="required">*</span></p>',
			wp_get_current_user()->display_name,
			wp_logout_url(get_permalink()),
		),
	),
);?>