
<ul>
	<li>Comments
		<ul>
			<?php if (have_comments()) {

				wp_list_comments();

			} else { ?>

				<li>
					none
				</li>

			<?php } ?>
		</ul>
	</li>
 </ul>

 <?php comment_form($args = array(
	'id_form'           	=> 'commentform',
	'title_reply_before'   	=> '<h2 id="reply-title" class="comment-reply-title">',
	'title_reply_after'    	=> '</h2>',
	'title_reply'       	=> 'Leave a Comment',
	'title_reply_to'    	=> 'Leave a Comment to %s',
	'cancel_reply_link'		=> 'Cancel Comment',
	'comment_notes_before'  => 'Your email address will not be published. Required fields are marked *',
	'comment_field' 		=>  '<p><label for="comment" class="d-none">Comments</label><textarea placeholder="* Start typing..." id="comment" name="comment" rows="8" required aria-required="true"></textarea></p>',
	'comment_notes_after'	=> '<p class="form-allowed-tags">' .
	'You may use these <abbr title="HyperText Markup Language">HTML</abbr> tags and attributes:' .
	'</p><p class="alert alert-info">' . allowed_tags() . '</p>',
	'fields' => array(
		'author' 	=> '<p class="comment-form-author"><label for="author" class="d-none">Author</label><input id="author" name="author" required aria-required="true" placeholder="* Name"></p>',
		'email' 	=> '<p class="comment-form-email"><label for="email" class="d-none">Email</label><input id="email" name="email" required aria-required="true" placeholder="* E-Mail"></p>',
		'url' 		=> '<p class="comment-form-url"><label for="url" class="d-none">Website</label><input id="url" name="url" placeholder="Website"></p>',
		'cookies' 	=> '<p class="comment-form-cookies"><input id="cookies" type="checkbox"><label for="cookies">Save my name, email, and website in this browser for the next time I comment.</label></p>' ,
	),
	'id_submit'     => 'commentsubmit'
)
);?>