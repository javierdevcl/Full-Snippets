<div id="mobile_menu_trigger" class="mobile_view">
	<span class="menuline trans"></span>
	<span class="menuline trans"></span>
	<span class="menuline trans"></span>
</div>

<div id="mobile_menu_wrapper" class="trans">
	<?php wp_nav_menu( array('theme_location' => 'main_menu', 'menu_class' => 'mobile_menu mobile_view', 'container_class' => 'mobile_mobile_container' ) ); ?>
</div>

function mobileMenu() {
    jQuery('#mobile_menu_trigger').click(function() {
        jQuery('body').toggleClass('mobile_menu_active');
    });

    jQuery('#mobile_mobile_wrapper ul > li.menu-item-has-children > a').click(function(e){
        e.preventDefault();
        jQuery(this).parent().find('ul.sub-menu').slideToggle();
    });

    jQuery('#mobile_menu_wrapper a').click(function() {
        jQuery('body').removeClass('mobile_menu_active');
    });
}

/*mobile menu*/
div#mobile_menu_trigger {
    position: fixed;
    z-index: 9999;
    top: 5px;
    left: 5px;
    width: 60px;
    height: 50px;
    padding: 10px;
    cursor: pointer;
    border-radius: 5px;
    background: #e66c22;
}
span.menuline {
    display: block;
    width: 100%;
    height: 6px;
    margin-bottom: 6px;
    border-radius: 4px;
    background: #fff;
}
#mobile_menu_wrapper {
    position: fixed;
    z-index: 999;
    top: 0;
    right: -250px;
    width: 250px;
    height: 100%;
    padding: 20px;
    font-weight: bold;
    background: #e66c22;
}
#mobile_menu_wrapper ul li {
    margin-bottom: 20px;
}
#mobile_menu_wrapper ul li a {
    color: #fff;
    font-size:20px;
    font-family: 'Open Sans Hebrew', serif;
}
#mobile_menu_wrapper ul li ul.sub-menu li a  {
    font-size:14px;
}
body.mobile_menu_active  div#mobile_menu_trigger span.menuline {
    position: absolute;
    top: 0;
    right: 0;
    bottom: 0;
    left: 0;
    margin: auto;
    width:45px;
}
body.mobile_menu_active div#mobile_menu_trigger span.menuline:nth-child(1) {
    -webkit-transform: rotate(135deg);
    -ms-transform: rotate(135deg);
    transform: rotate(135deg);
}
body.mobile_menu_active div#mobile_menu_trigger span.menuline:nth-child(2) {
    -webkit-transform: rotate(45deg);
    -ms-transform: rotate(45deg);
    transform: rotate(45deg);
}
body.mobile_menu_active div#mobile_menu_trigger span.menuline:nth-child(3) {
    display: none;
}
body.mobile_menu_active #mobile_menu_wrapper {
    right: 0;
}