ENGLISH

<?php get_header(); global $wp_query; $total = $wp_query->found_posts;?>

<div class="container">
	<article id="content">
		<h2 id="search_count">
			<?php _e('Found ', 'ecoma'); echo $total; _e(' items with the term ', 'ecoma'); ?><span><?php the_search_query(); ?></span>
		</h2>
		<ul id="search_results">
			<?php while (have_posts()) : the_post(); ?>
				<li>
					<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
					<?php 
						if(has_excerpt()) {$content = get_the_excerpt();}else $content = get_the_content();
						$trimmed_content = wp_trim_words( $content, 28 );
					?>
					<p><?php echo $trimmed_content;?><a href="<?php the_permalink();?>"><?php _e(' More details...', 'ecoma');?></a></p>
				</li>
			<?php endwhile;?>
		</ul>
		<?php get_template_part('pagination');?>
	</article>
</div>

<?php get_footer(); ?>




HEBREW

<?php get_header(); global $wp_query; $total = $wp_query->found_posts;?>

<div class="container">
	<article id="content">
		<h2 id="search_count">
			<?php _e('נמצאו ', 'ecoma'); echo $total; _e(' פריטים עם המונח ', 'ecoma'); ?><span><?php the_search_query(); ?></span>
		</h2>
		<ul id="search_results">
			<?php while (have_posts()) : the_post(); ?>
				<li>
					<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
					<?php 
						if(has_excerpt()) {$content = get_the_excerpt();}else $content = get_the_content();
						$trimmed_content = wp_trim_words( $content, 28 );
					?>
					<p><?php echo $trimmed_content;?><a href="<?php the_permalink();?>"><?php _e(' לפרטים נוספים...', 'ecoma');?></a></p>
				</li>
			<?php endwhile;?>
		</ul>
		<?php get_template_part('pagination');?>
	</article>
</div>

<?php get_footer(); ?>

#pagination {
    display: block;
    text-align: center;
    direction:ltr;
    margin:40px 0 10px;
    font-size:18px;
    font-weight: 100;
}
#pagination a:hover {
    color:red;
}
#pagination .page-numbers.current {
    color:red;
}
h2#search_count {
    font-size: 24px;
    margin-bottom: 25px;
}
ul#search_results li {
    list-style-type: none;
    margin-bottom: 30px;
}
ul#search_results li a {
    color:#529542;
}