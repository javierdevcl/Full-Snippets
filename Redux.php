$this->sections[] = array(
	'icon'   => 'el-icon-shopping-cart',
	'title'  => __( 'חנות', 'redux-framework-demo' ),
	'fields' => array(
		array(
			'id'       => 'sale_id',
			'type'     => 'select',
			'data'  => 'terms',
			'args' => array('taxonomies' => 'product_cat'),
			'title'     => 'עמוד הבמצעים'
		),
	)
); 