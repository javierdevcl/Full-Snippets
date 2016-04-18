#pagination {
	display: block;
	text-align: center;
	direction:ltr;
	margin:30px 0 10px;
  	font-size:22px;
}
#pagination a:hover {
	color:red;
}
#pagination .page-numbers.current {
	color:red;
}


/*Query_posts Pagination*/

<?php query_posts(array('posts_per_page'=>4,'paged'=>(get_query_var('paged') ? get_query_var('paged') : 1))); while (have_posts()) : the_post(); ?>