wp_enqueue_script( 'validation', THEME . '/js/validation.min.js', array('jquery'), '1.15.0', true );
wp_enqueue_script( 'validation-additional-methods', THEME . '/js/additional-methods.min.js', array('validation'), '1.15.0', true );
	
function career_form_validation() {
    var validator = jQuery('.career_in form').validate({
        rules: {
            name: {
                required: true
            },
            email: {
                email: true,
                required: true
            },
            cv: {
                required: true,
                extension: "docx|txt|doc|pdf|rtf"
            },
        },
        messages: {
            name: "שדה שם לא מולא, אנא מלא לפני שליחה",
            email: {
                email: "כתובת המייל אינה חוקית",
                required: "שדה מייל לא מולא, אנא מלא לפני שליחה",
            },
            cv: {
                required: "נא להוסיף קו''ח לפני השליחה",
                extension: "יש להעלות קובץ מסמך בלבד. סוגי קבצים מותרים: pdf, docx, doc, txt, rtf"
            }
        }
    });
}

