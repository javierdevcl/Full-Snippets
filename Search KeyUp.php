function search_data_center_type() {
    jQuery('#users_search .search_input').keyup(function() {
        search_string = jQuery(this).val();
        jQuery('ul.participants li').each(function() {
            name = jQuery(this).find('span.name').text();
            if (name.indexOf(search_string) > -1) {
                jQuery(this).css('display', 'block');
            }
            else {
                jQuery(this).css('display', 'none');
            }
        });
    });
}

function search_data_center_type() {
    jQuery('.search-submit').click(function() {
        search_string = jQuery('#search_by_field').val();
        jQuery('tr.data_center').each(function() {
            term = jQuery(this).data('term');
            if (term.indexOf(search_string) > -1) {
                jQuery(this).removeClass('hide').addClass('show')
            }
            else {
                jQuery(this).removeClass('show').addClass('hide');
            }
        });
    });
}