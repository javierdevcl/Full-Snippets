HEBREW 

    /* START Make the cart table responsive */
    /* http://css-tricks.com/responsive-data-tables/ */

    .woocommerce-cart .sitewrap {
        overflow: hidden;
    }
	
    /* Force table to not be like tables anymore */
    .woocommerce-page table.shop_table,
    .woocommerce-page table.shop_table thead,
    .woocommerce-page table.shop_table tbody,
    .woocommerce-page table.shop_table th,
    .woocommerce-page table.shop_table td,
    .woocommerce-page table.shop_table tr {
        display: block;
    }

    /* Hide table headers (but not display: none;, for accessibility) */
    .woocommerce-page table.shop_table thead tr {
        position: absolute;
        top: -9999px;
        left: -9999px;
    }

    .woocommerce-page table.shop_table tr {
        /*border: 1px solid #d2d3d3; */
    }

    .woocommerce-page table.shop_table td {
        position: relative;
        padding-right: 60% !important;
        /* Behave  like a "row" */
        border: 1px solid #d2d3d3;
    }

    .woocommerce-page table.shop_table {
        border: none;
    }

    .woocommerce-page table.shop_table td.product-spacer {
        height: 10px;
        border-color: #fff;
    }

    .woocommerce-page table.shop_table td:before {
        /* Now like a table header */
        position: absolute;
        /* Top/left values mimic padding */
        top: 6px;
        right: 6px;
        width: 45%;
        padding-left: 10px;
        white-space: nowrap;
    }

    /*
    Label the data
    */
    .woocommerce-page table.shop_table td.product-remove:before {
        content: 'מחק';
    }

    .woocommerce-page table.shop_table td.product-thumbnail:before {
        content: 'תמונה';
    }

    .woocommerce-page table.shop_table td.product-name:before {
        content: 'מוצר';
    }

    .woocommerce-page table.shop_table td.product-price:before {
        content: 'מחיר';
    }

    .woocommerce-page table.shop_table td.product-quantity:before {
        content: 'כמות';
    }

    .woocommerce-page table.shop_table td.product-subtotal:before {
        content: 'סכום ביניים';
    }

    .woocommerce-page table.shop_table td.product-total:before {
        content: 'סך הכל';
    }

    .woocommerce .quantity,
    .woocommerce #content .quantity,
    .woocommerce-page .quantity,
    .woocommerce-page #content .quantity {
        margin: 0;
    }

    .woocommerce-page table.cart td.actions,
    .woocommerce-page #content table.cart td.actions {
        padding-right: 6px !important;
        text-align: left;
        border: 0;
    }

    .woocommerce-page table.cart td.actions .button.alt,
    .woocommerce-page #content table.cart td.actions .button.alt {
        float: left;
        margin-top: 10px;
    }

    .woocommerce-page table.cart td.actions div,
    .woocommerce-page #content table.cart td.actions div,
    .woocommerce-page table.cart td.actions input,
    .woocommerce-page #content table.cart td.actions input {
        margin-bottom: 10px;
    }

    .woocommerce-page .cart-collaterals .cart_totals {
        float: right;
        width: 100%;
        text-align: right;
    }

    .woocommerce-page .cart-collaterals .cart_totals th,
    .woocommerce-page .cart-collaterals .cart_totals td {
        border: 0 !important;
    }

    .woocommerce-page .cart-collaterals .cart_totals table tr.cart-subtotal td,
    .woocommerce-page .cart-collaterals .cart_totals table tr.shipping td,
    .woocommerce-page .cart-collaterals .cart_totals table tr.total td {
        padding-left: 6px !important;
    }

    .woocommerce-page table.shop_table tr.cart-subtotal td,
    .woocommerce-page table.shop_table tr.shipping td,
    .woocommerce-page table.shop_table tr.total td,
    .woocommerce-page table.shop_table.order_details tfoot th,
    .woocommerce-page table.shop_table.order_details tfoot td {
        padding-right: 6px !important;
        border: 0 !important;
    }

    .woocommerce-page table.shop_table tbody {
        padding-top: 10px;
    }

    .woocommerce .col2-set .col-1,
    .woocommerce-page .col2-set .col-1,
    .woocommerce .col2-set .col-2,
    .woocommerce-page .col2-set .col-2,
    .woocommerce form .form-row-first,
    .woocommerce form .form-row-last,
    .woocommerce-page form .form-row-first,
    .woocommerce-page form .form-row-last {
        float: none;
        width: 100%;
    }

    .woocommerce .order_details ul,
    .woocommerce-page .order_details ul,
    .woocommerce .order_details,
    .woocommerce-page .order_details {
        padding: 0;
    }

    .woocommerce .order_details li,
    .woocommerce-page .order_details li {
        clear: right;
        margin-bottom: 10px;
        border: 0;
    }

    /* END Make the cart table responsive */
	
	
	
	
	
ENGLISH 

/* START Make the cart table responsive */
/* http://css-tricks.com/responsive-data-tables/ */

/* Force table to not be like tables anymore */
.woocommerce-page table.shop_table, 
.woocommerce-page table.shop_table thead, 
.woocommerce-page table.shop_table tbody, 
.woocommerce-page table.shop_table th, 
.woocommerce-page table.shop_table td, 
.woocommerce-page table.shop_table tr { 
	display: block; 
}

/* Hide table headers (but not display: none;, for accessibility) */
.woocommerce-page table.shop_table thead tr { 
	position: absolute;
	top: -9999px;
	left: -9999px;
}

.woocommerce-page table.shop_table tr { 
	/*border: 1px solid #d2d3d3; */
}

.woocommerce-page table.shop_table td { 
	/* Behave  like a "row" */
	border: 1px solid #d2d3d3; 
	position: relative;
	padding-left: 30% !important; 
}

.woocommerce-page table.shop_table {
	border: none;
}

.woocommerce-page table.shop_table td.product-spacer {
	border-color: #FFF;
	height: 10px;
}

.woocommerce-page table.shop_table td:before { 
	/* Now like a table header */
	position: absolute;
	/* Top/left values mimic padding */
	top: 6px;
	left: 6px;
	width: 45%; 
	padding-right: 10px; 
	white-space: nowrap;
}

/*
Label the data
*/
.woocommerce-page table.shop_table td.product-remove:before {
	content: "DELETE";
}

.woocommerce-page table.shop_table td.product-thumbnail:before {
	content: "IMAGE";
}

.woocommerce-page table.shop_table td.product-name:before {
	content: "PRODUCT";
}

.woocommerce-page table.shop_table td.product-price:before {
	content: "PRICE";
}

.woocommerce-page table.shop_table td.product-quantity:before {
	content: "QUANTITY";
}

.woocommerce-page table.shop_table td.product-subtotal:before {
	content: "SUBTOTAL";
}

.woocommerce-page table.shop_table td.product-total:before {
	content: "TOTAL";
}

.woocommerce .quantity, 
.woocommerce #content .quantity, 
.woocommerce-page .quantity, 
.woocommerce-page #content .quantity {
	margin: 0;
}

.woocommerce-page table.cart td.actions, 
.woocommerce-page #content table.cart td.actions {
	text-align: left;
	border:0;
	padding-left: 6px !important;
}

.woocommerce-page table.cart td.actions .button.alt, 
.woocommerce-page #content table.cart td.actions .button.alt {
	float: left;
	margin-top: 10px;
}

.woocommerce-page table.cart td.actions div, 
.woocommerce-page #content table.cart td.actions div,
.woocommerce-page table.cart td.actions input, 
.woocommerce-page #content table.cart td.actions input {
	margin-bottom: 10px;
}

.woocommerce-page .cart-collaterals .cart_totals {
	float: left;
	width: 100%;
	text-align: left;
}

.woocommerce-page .cart-collaterals .cart_totals th, 
.woocommerce-page .cart-collaterals .cart_totals td {
	border:0 !important;
}

.woocommerce-page .cart-collaterals .cart_totals table tr.cart-subtotal td,
.woocommerce-page .cart-collaterals .cart_totals table tr.shipping td,
.woocommerce-page .cart-collaterals .cart_totals table tr.total td {
	padding-left: 6px !important;
}

.woocommerce-page table.shop_table tr.cart-subtotal td,
.woocommerce-page table.shop_table tr.shipping td,
.woocommerce-page table.shop_table tr.total td,
.woocommerce-page table.shop_table.order_details tfoot th,
.woocommerce-page table.shop_table.order_details tfoot td {
	padding-left: 6px !important;
	border:0 !important;
}

.woocommerce-page table.shop_table tbody {
	padding-top: 10px;
}

.woocommerce .col2-set .col-1, 
.woocommerce-page .col2-set .col-1,
.woocommerce .col2-set .col-2, 
.woocommerce-page .col2-set .col-2,
.woocommerce form .form-row-first, 
.woocommerce form .form-row-last, 
.woocommerce-page form .form-row-first, 
.woocommerce-page form .form-row-last {
	float: none;
	width: 100%;
}

.woocommerce .order_details ul, 
.woocommerce-page .order_details ul,
.woocommerce .order_details, 
.woocommerce-page .order_details {
	padding:0;
}

.woocommerce .order_details li, 
.woocommerce-page .order_details li {
	clear: left;
	margin-bottom: 10px;
	border:0;
}

/* END Make the cart table responsive */

