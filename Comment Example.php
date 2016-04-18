<?php /* Template Name: Opinions*/; 
get_header();
	while(have_posts()) : the_post(); 
		the_content();
        
        comments_template();
	endwhile;
get_sidebar();
get_footer();
?>

<?php //in functions 

function remove_comment_fields($fields) {
    unset($fields['email']);
    unset($fields['url']);
    return $fields;
}
add_filter('comment_form_default_fields', 'remove_comment_fields');



//in comments.php
$commenter = wp_get_current_commenter();
$req = get_option( 'require_name_email' );
$aria_req = ( $req ? " aria-required='true'" : '' );

$comment_args = array(
  'id_form'           => 'commentform',
  'id_submit'         => 'submit',
  'class_submit'      => 'submit',
  'name_submit'       => 'submit',
  'title_reply'	  	  => __( 'Add Comment:', 'eretzhagalil' ),
  'label_submit'      => __( 'Send Comment', 'eretzhagalil' ),
  'format'            => 'xhtml',
  'comment_field' =>  '<div class="textarea_wrapper"><textarea id="comment" name="comment" placeholder="'.__('Message','eretzhagalil').'" aria-required="true"></textarea></div>',
  'must_log_in' => '',
  'logged_in_as' => '',
  'comment_notes_before' => '',
  'comment_notes_after' => '',
);
?>

<div class="add_comment_form">
	<?php comment_form($comment_args);?>
</div>


<?php $comments = get_comments($post->ID);?>
<?php if($comments):?>
	<div class="scroll_container">
		<ul class="comment_list">
			<?php 
			foreach($comments as $comment) :
				if($comment->comment_approved == 1) :?>
					<li class="comment">
						<?php if(get_field('subject', $comment)):?>
							<div class="subject">
								<h3><?php _e('Subject:', 'eretzhagalil');?> <?php the_field('subject', $comment);?></h3>
							</div>
						<?php endif;?>
						<?php if(get_field('name', $comment)):?>
							<div class="author">
								<h3><?php _e('Name:', 'eretzhagalil');?> <?php the_field('name', $comment);?></h3>
							</div>
						<?php endif;?>
						<?php if(get_field('rate', $comment)):?>
							<div class="rate">
								<h3><?php _e('Rate:', 'eretzhagalil');?> <?php the_field('rate', $comment);?></h3>
							</div>
						<?php endif;?>
						<?php if($comment->comment_content):?>
							<p class="content"><?php echo  $comment->comment_content;?></p>
						<?php endif;?>
					</li>
				<?php endif;?>
			<?php endforeach;?>
		</ul>
	</div>
<?php endif;?>

