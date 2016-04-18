<div class="input_wrapper">
	<input type="checkbox" id="check_1" /><label for="check_1"></label><span>לורם איפסום דולור</span>
</div>

input[type='checkbox'] {
    display: none;
}
input[type='checkbox'] + label {
    display: inline-block;
    width: 14px;
    height: 14px;
    padding: 0;
    background: url(img/sprite.png) no-repeat;
    background-position: -158px -153px;
    cursor: pointer;
	vertical-align:top;
}
input[type='checkbox']:checked + label {
    display: inline-block;
    width: 14px;
    height: 14px;
    padding: 0;
    background: url(img/sprite.png) no-repeat;
    background-position: -134px -153px;
}


function checkbox_cf7() {
    jQuery('.approve_wrapper .approve_img').click(function () {
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
