<?php if(get_field('cf_id')) echo do_shortcode('[contact-form-7 id="'.get_field('cf_id').'"]');?>

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







on_sent_ok: "document.location='/thanks/';"

function toyota_campaing_conversion(){
    google_conversion();
    facebook_conversion();
}

function google_conversion(){
    var google_conversion_id = 983415949;
    var google_conversion_language = "en";
    var google_conversion_format = "3";
    var google_conversion_color = "ffffff";
    var google_conversion_label = "b8LvCPeC3mEQjfn21AM";
    var google_remarketing_only = false;

    jQuery.getScript("//www.googleadservices.com/pagead/conversion.js");
}
function facebook_conversion(){
    (function() {
      var _fbq = window._fbq || (window._fbq = []);
      if (!_fbq.loaded) {
        var fbds = document.createElement('script');
        fbds.async = true;
        fbds.src = '//connect.facebook.net/en_US/fbds.js';
        var s = document.getElementsByTagName('script')[0];
        s.parentNode.insertBefore(fbds, s);
        _fbq.loaded = true;
      }
    })();

    window._fbq = window._fbq || [];
    window._fbq.push(['track', '6044328182873', {'value':'0.00','currency':'ILS'}]);
}




<div class="contact_property clearfix">
	<span class="contact-title">Please fill your details and we will contact you soon!</span>
	<div class="contact-col first-col">
		<h2 class="col-title">Details About the Property</h2>
		<div class="field clearfix"><label>Place of Property</label><div class="input_wrapper">[select place include_blank "Tel Aviv" "Ramat Gan"]</div></div>
		<div class="field clearfix"><label>Type of Property</label><div class="input_wrapper">[select type include_blank "House" "Apartment"]</div></div>
		<div class="field clearfix"><label>Address</label><div class="input_wrapper">[text address]</div></div>
		<div class="field clearfix"><label>Sq Ft</label><div class="input_wrapper">[number sq_ft]</div></div>
		<div class="field clearfix"><label>Sq Ft 2</label><div class="input_wrapper">[number sq_ft_2]</div></div>
		<div class="field clearfix"><label>Age of Property</label><div class="input_wrapper">[number age]</div></div>
		<div class="field clearfix"><label>Number of Rooms</label><div class="input_wrapper">[number rooms]</div></div>
		<div class="field clearfix"><label>Number of Bedrooms</label><div class="input_wrapper">[number bedrooms]</div></div>
		<div class="field field-50 clearfix"><label>Floor</label><div class="input_wrapper">[number floor]</div></div>
		<div class="field field-50 clearfix"><label>Out of</label><div class="input_wrapper">[number out_of]</div></div>
		<div class="field clearfix"><label>Number of Porches</label><div class="input_wrapper">[number porch]</div></div>
		<div class="field clearfix"><label>Porches Sq Ft</label><div class="input_wrapper">[number porch_sq_ft]</div></div>
		<div class="field clearfix"><label>Comments</label><div class="input_wrapper">[textarea comments]</div></div>
	</div>
	<div class="contact-col">
		<h2 class="col-title">Details About the Owner</h2>
		<div class="field clearfix"><label>First Name</label><div class="input_wrapper">[text* name]</div></div>
		<div class="field clearfix"><label>Family Name</label><div class="input_wrapper">[text family]</div></div>
		<div class="field clearfix"><label>Email Address</label><div class="input_wrapper">[email* email]</div></div>
		<div class="field clearfix"><label>Phone Number</label><div class="input_wrapper">[tel* phone]</div></div>
		<div class="field updates clearfix">[checkbox updates "Email me about updates"]</div>
		<div class="submit_wrapper">[submit class:cform_send "Send"]</div>
	</div>
</div>


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