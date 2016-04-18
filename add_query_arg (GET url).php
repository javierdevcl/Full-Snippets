PAGE WITH LINK

<a href="<?php echo add_query_arg(array('lessonID' => $post->ID), get_permalink($ex->ID)); ?>">


PAGE THAT _GET's URL

<?php 
	$lesson_id = isset($_GET['lessonID']) ? $_GET['lessonID'] : '';
	if($lesson_id) 
		lesson_number = get_field('lesson_number',$lesson_id);
?>