<div class="contact_form clearfix">
	<div class="input_wrap">[text* name placeholder "Name *"]</div>
	<div class="input_wrap">[text* family_name placeholder "Family Name *"]</div>
	<div class="input_wrap">[text* address placeholder "Address *"]</div>
	<div class="input_wrap">[tel* phone placeholder "Phone *"]</div>
	<div class="input_wrap">[email* email placeholder "Email *"]</div>
	<div class="input_wrap">[text* company placeholder "Company *"]</div>
	<div class="input_wrap">[textarea* message placeholder "Message *"]</div>
	<div class="input_wrap submit_wrap">[submit "Send"]</div>
</div>

<div class="contact_form clearfix">
	<div class="input_wrap">[text* name placeholder "שם מלא*"]</div>
	<div class="input_wrap">[text* name placeholder "שם משפחה*"]</div>
	<div class="input_wrap">[text* address placeholder "כתובת*"]</div>
	<div class="input_wrap">[tel* phone placeholder "טלפון*"]</div>
	<div class="input_wrap">[email* email placeholder "דואר אלקטרוני*"]</div>
	<div class="input_wrap">[text* company placeholder "חברה*"]</div>
	<div class="input_wrap textarea_wrap">[textarea message placeholder "הודעה"]</div>
	<div class="input_wrap submit_wrap">[submit "שלח"]</div>
</div>

<!-- Message Body -->

From: [name] [family_name]
Email: [email]
Phone: [phone]
Address: [address]
Company: [company]

Message: 
[message]

מאת: [name]
אימייל: [email]
טלפון: [phone]
כתובת: [address]
חברה: [company]

הודעה:
[message]

<!-- CSS -->


.wpcf7 img.ajax-loader {

}
.wpcf7 input.wpcf7-submit {
	
}
.wpcf7 div.wpcf7-response-output {
	padding:0;
	margin:0;
	border:none;
	clear:both
}
.wpcf7-not-valid {
	border:1px solid red !important;
}
span.wpcf7-not-valid-tip {
	display: none;
}
.wpcf7-validation-errors {
	color:red;
}
.wpcf7-mail-sent-ok {
	color:green;
}


.wpcf7 ::-webkit-input-placeholder {
    color:#00135d;
}
.wpcf7 :-moz-placeholder {
    color:#00135d;
}
.wpcf7 ::-moz-placeholder {
    color:#00135d;
}
.wpcf7 :-ms-input-placeholder {
    color:#00135d;
}



.wpcf7 input.wpcf7-validates-as-required::-webkit-input-placeholder:after {
	content:'*';
	color:red;
}
.wpcf7 input.wpcf7-validates-as-required:-moz-placeholder:after {
	content:'*';
	color:red;
}
.wpcf7 input.wpcf7-validates-as-required::-moz-placeholder:after {
	content:'*';
	color:red;
}
.wpcf7 input.wpcf7-validates-as-required:-ms-input-placeholder:after {
	content:'*';
	color:red;
}


STYLE CHECKBOX
---------------

<div class="approve_wrapper"><div class="approve_img"></div>[checkbox approve id:approve "I would like to receive updates about projects and real estate sales"]</div>

function checkbox_cf7() {
    jQuery('.checkbox_wrapper .checkbox_img').click(function () {
        var chk = jQuery(this).parent().find("input[type='checkbox']");
        if (!chk.prop('checked')) {
            jQuery(this).addClass('checked');
            chk.prop('checked', true);
        } else {
            jQuery(this).removeClass('checked');
            chk.prop('checked', false);
        }
    });
}



DB TO WPCF7
-----------

functions.php
wpcf7_add_shortcode('postdropdown', 'createbox', true);

function createbox() {
    global $post;
    $args = array( 'post_type'=> 'suite' );
    $myposts = get_posts( $args );
    $output = "<select name=suite value=suite><option value=notchosen>בחר חדר</option>";
    foreach ( $myposts as $post ) : setup_postdata($post);
        $title = get_the_title();
        $output .= "<option value='$title'> $title </option>";

        endforeach;
    $output .= "</select>";
    return $output;
}

contact form 7 form
Write [postdropdown] shortcode where you want the field to appear.

contact form mail
סוויטה: [suite] (the option value)


INSERT MESSAGE TO DB
--------------------

add_action( 'wpcf7_before_send_mail', 'insert_testimonial' );

function insert_testimonial( $cf7 ) {
    $author             = isset($_POST["full_name"]) ? sanitize_text_field( $_POST["full_name"] ) : '';
    $post_title         = isset($_POST["post_title"]) ? sanitize_text_field( $_POST["post_title"] ) : '';
    $post_content       = isset($_POST["post_content"]) ? sanitize_text_field( $_POST["post_content"] ) : '';
    $date_of_holiday    = isset($_POST["date_of_holiday"]) ? sanitize_text_field( $_POST["date_of_holiday"] ) : '';
    $comments           = isset($_POST["comments"]) ? sanitize_text_field( $_POST["comments"] ) : '';

    wp_insert_post( array(
        'post_type' => 'testimonial',
        'post_title' => $post_title,
        'post_content' => $post_content,
        'post_status' => 'pending',
        'meta_input' => array(
                'author' => $author,
                'date_of_holiday' => $date_of_holiday,
                'comments' => $comments
            )
        )
    );
}

