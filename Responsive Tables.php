HTML

<table>
	<tr>
		<th>Title #1</th>
		<th>Title #2</th>
		<th>Title #3</th>
	</tr>
	<tr>
		<td>Content #1</td>
		<td>Content #2</td>
		<td>Content #3</td>
	</tr>
	<tr>
		<td>Content #1</td>
		<td>Content #2</td>
		<td>Content #3</td>
	</tr>
</table>

JavaScript

function responsive_table() {
    var table_th = [];

    jQuery("table th").each(function(){
        var dataText = jQuery(this).text();
        jQuery(this).attr("data-th", dataText);  

        table_th.push(dataText);
    });

    jQuery("td").each(function(index, value){
        jQuery(this).attr("data-th", table_th[jQuery(this).index()]); 
    });
}

CSS

@media only screen and (max-width: 768px) {
    table th {
        display: none;
    }
    table tr {
        border-bottom: 1px solid #000;
    }
    table td {
        display: block;
        width: 100%;
    }
    table td:before {
        font-weight: bold;
        display: block;
        width: 100%;
        content: attr(data-th) ': ';
    }
}