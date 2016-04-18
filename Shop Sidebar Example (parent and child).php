<?php if ( is_active_sidebar( 'sidebar' ) ) : ?>
	<aside class="sidebar" role="complementary">
		<?php get_product_search_form();?>

		<?php 
			if(is_singular('product')){
				$mypost = get_queried_object();
				$post_terms = get_the_terms($mypost->ID,'product_cat');
				$current_cat = reset($post_terms);
				$cat_parent_id = $current_cat->parent;
			}
			elseif(is_tax('product_cat')){
				$current_cat = get_queried_object();
				if($current_cat->parent){
					$cat_parent_id = $current_cat->parent;
				}
			}
		?>
			
				<h2 class="widgettitle"><?php _e('קטגוריות מוצרים', 'guyayal');?></h2>
				<ul class="product-categories">
					
				<?php	$parents = get_terms('product_cat',array('parent'=>0));
					foreach ($parents as $parent) :?>
							<?php $term_link = get_term_link($parent);
								if($current_cat->term_id == $parent->term_id || $cat_parent_id == $parent->term_id){
									$active = 'active';
								}else $active = '';
							?>
							<li class="cat-item <?php echo $active;?>"><a href="<?php echo $term_link;?>"><?php echo $parent->name;?></a>
							<?php $children = get_terms('product_cat',array('child_of'=>$parent->term_id)); ?>
							<?php if($children):?>
								<ul class="product-categories children">
								<?php foreach ($children as $child): ?>
									<?php $term_link = get_term_link($child);
										if($current_cat->term_id == $child->term_id){
											$active = 'active';
										}else $active = '';
									?>
									<li class="cat-item child <?php echo $active;?>"><a href="<?php echo $term_link;?>"><?php echo $child->name;?></a></li>
								<?php endforeach;?>
								</ul>
							<?php endif;?>
							</li>
					<?php endforeach;?>
				</ul>
			
		<?php endif; ?>
</aside>












<aside class="sidebar" role="complementary">
<!-- PRODUCTS MENU -->
	<div class="product_menu_widget">
		<?php 
			if(is_singular('product')){
				$thepost = get_queried_object();
				$post_terms = get_the_terms($thepost->ID,'product_cat');
				$current_cat = reset($post_terms);
				$cat_parent_id = $current_cat->parent;
			}
			elseif(is_tax('product_cat')){
				$current_cat = get_queried_object();
				if($current_cat->parent){
					$cat_parent_id = $current_cat->parent;
				}else {
					$cat_parent_id = $current_cat->term_id;
				}
			}
		?>
			
		<h2 class="widget_title"><?php _e('קטלוג מוצרים', 'yezirot');?></h2>
		<ul class="product-categories">	
			<?php $parents = get_terms('product_cat',array('parent'=>0));
			foreach ($parents as $parent) :?>
					<?php 
						$term_link = get_term_link($parent);
						if($current_cat->term_id == $parent->term_id || $cat_parent_id == $parent->term_id){
							$active = 'active';
						} else $active = '';
					?>
					<li class="cat-item <?php echo $active;?>"><a href="<?php echo $term_link;?>"><?php echo $parent->name;?></a>
						<?php $children = get_terms('product_cat',array('child_of'=>$parent->term_id)); ?>
						<?php if($children):?>
							<ul class="product-categories children">
								<?php foreach ($children as $child): ?>
									<?php 
										$term_link = get_term_link($child);
										if($current_cat->term_id == $child->term_id){
											$active = 'active';
										}else $active = '';
									?>
									<li class="cat-item child <?php echo $active;?>"><a href="<?php echo $term_link;?>"><?php echo $child->name;?></a></li>
								<?php endforeach;?>
							</ul>
						<?php endif;?>
					</li>
			<?php endforeach;?>
		</ul>
	</div>
<!-- /PRODUCTS MENU -->
</aside>