<!-- Inside <head> (after meta...) -->

<?php if(!empty($redux['google_analytics'])) :?>
	<?php echo $redux['google_analytics'];?>
<?php endif;?>

<!-- Redux -->

array(
	'id'       => 'google_analytics',
	'type'     => 'textarea',
	'title'     => 'קוד לגוגל אנליטיקס',
	'subtitle' => 'כלול תגיות &ltscript&gt'
),