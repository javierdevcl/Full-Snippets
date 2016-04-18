<?php if(have_rows('faq_repeater')):?>
	<ul class="faq accordion">
		<?php while(have_rows('faq_repeater')) : the_row();?> 
			<li>
				<div class="question">
					<?php the_sub_field('question');?>
				</div>
				<div class="answer">
					<?php the_sub_field('answer');?>
				</div>
			</li>
    	<?php endwhile; ?>       
	</ul>
<?php endif;?>

<script>
	jQuery('ul.accordion li > .question').click(function() {
		this_li = jQuery(this).parent();
		if(!this_li.hasClass('open')) {
			jQuery('ul.accordion li.open').removeClass('open').find('.answer').slideToggle();
			jQuery(this_li).addClass('open').find('.answer').slideToggle();
		}
	});
</script>

ul.accordion li div.question {
    cursor: pointer;
}
ul.accordion li.open div.question {
    color:red;
}
ul.accordion li div.answer {
    display: none;
}