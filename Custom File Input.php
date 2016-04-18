[file file]<div class="upload_wrapper"><div class="upload_btn">UPLOAD</div><span class="filepath">No file selected</span></div>

function upload_button_fix() {
	jQuery('.upload_btn').click(function () {
		jQuery("input[type='file']").trigger('click');
	})

	jQuery("input[type='file']").change(function () {
		jQuery('.filepath').text(this.value.replace(/C:\\fakepath\\/i, ''))
	});
}
	
.contact_form input[type='file'] {
    position: absolute;
    left: -9999px;
}