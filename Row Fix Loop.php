<!-- outside the loop -->
<?php $i = 0;?>

<!-- inside the loop -->
<?php 
	if($i % 3 == 0){
		$class  = 'first';
	}
	else $class = '';
?>

<?php $i++;?>

<div class="unit-25 <?php echo $class;?>">	

.first {
	margin-left:0 !important;
}