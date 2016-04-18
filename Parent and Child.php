<?php 
	$current_cat = get_queried_object();
	if($current_cat->parent) :?>
		<ul class="product-categories">
			<h2 class="widgettitle">קטגוריות מוצרים</h2>
			<?php
			$terms = get_terms('product_cat');
			foreach ($terms as $term) :?>
				<?php if(!$term->parent ):?>
					<?php $term_link = get_term_link($term);?>
					<li class="cat-item"><a href="<?php echo $term_link;?>"><?php echo $term->name;?></a></li>
				<?php endif;?>
			<?php endforeach;?>
		</ul>
<?php endif; ?>	