<!--COMMENTS SECOND WAY-->
<div class="comments">
	<?php if( have_comments() ) { ?>
	<h4 class="comments-title">
		<?php comments_number(
		__('No comments for now.', 'luque'),
		__('There is a comment posted.', 'luque'),
		__('There are % comments.', 'luque')
		); ?>
	</h4>
	<ol id="comments-list">
		<?php wp_list_comments();?>
	</ol>
	<?php paginate_comments_links(); ?>
	<?php } ?>
	<?php comment_form(); ?>
</div><!-- .comments -->