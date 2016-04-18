wp_enqueue_script('jquery-ui-datepicker');
wp_enqueue_style('jquery-style', 'http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.2/themes/smoothness/jquery-ui.css');

function datePickerInit() {
	jQuery.datepicker.regional['he'] = {
		closeText: '����',
		prevText: '&#x3c;�����',
		nextText: '���&#x3e;',
		currentText: '����',
		monthNames: ['�����','������','���','�����','���','����',
		'����','������','������','�������','������','�����'],
		monthNamesShort: ['���','���','���','���','���','����',
		'����','���','���','���','���','���'],
		dayNames: ['�����','���','�����','�����','�����','����','���'],
		dayNamesShort: ['�\'','�\'','�\'','�\'','�\'','�\'','���'],
		dayNamesMin: ['�\'','�\'','�\'','�\'','�\'','�\'','���'],
		weekHeader: 'Wk',
		dateFormat: 'dd/mm/yy',
		firstDay: 0,
		isRTL: true,
		showMonthAfterYear: false,
		yearSuffix: ''
	};

	jQuery.datepicker.setDefaults(jQuery.datepicker.regional['he']);

	jQuery('.date_input').datepicker({
		dateFormat : 'dd-mm-yy'
	});
}

div.ui-datepicker {
    font-size: 14px;
}