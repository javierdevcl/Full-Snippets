jQuery('.reset_password_btn').click(function(e) {
  var email_to_send = jQuery("#email_to_send").val();
  var username = jQuery('.forgot_password_box').data('username');
  if(!email_to_send) {
	add_error(".forgot_password_box .message_holder", 'כתובת האימייל ריקה');
  } 
  else {
	jQuery.post(
	  MyAjax.ajaxurl,
	  {
	  action : 'reset_pass',
	  emailToSend : email_to_send,
	  username : username
	  },


	  function( response ) {

		if(response.success) {
		  add_error(".forgot_password_box .message_holder", response.success);
		}else if(response.error) {
		  add_error(".forgot_password_box .message_holder", response.error);
		}
	  },
	  'json'
	);
  }
});
	
	
add_action( 'wp_ajax_nopriv_reset_pass', 'reset_pass' );
add_action( 'wp_ajax_reset_pass', 'reset_pass' );

function reset_pass() {
    $email_to_send = isset($_POST['emailToSend']) ? sanitize_text_field($_POST['emailToSend']) : '';
    $username = isset($_POST['username']) ? sanitize_text_field($_POST['username']) : '';

    if(!empty($email_to_send)) {
      $user = get_user_by( 'email', $email_to_send );
      $messages = array();

      if($user && $user->user_login == $username) {
        $headers = "From: webmaster@lironmor.co.il\r\n";
        $headers .= "Reply-To: webmaster@lironmor.co.il\r\n";
        $headers .= "MIME-Version: 1.0\r\n";
        $headers .= "Content-Type: text/html; charset=UTF-8\r\n";

        global $new_password;
        $new_password = wp_generate_password();
        wp_set_password( $new_password, $user->ID );

        $message = '<html><body style="direction:rtl">';
        $message .= "<h1>התקבלה בקשתך לאיפוס סיסמה באתר לירון מור:</h1>";
        $message .= "<h2>סיסמתך החדשה: {$new_password}</h2>";
        $message .= '</body></html>';

        wp_mail( $email_to_send, 'איפוס סיסמה', $message, $headers );
        $messages['success'] = 'סיסמתך אופסה ונשלחה בהצלחה';
      }
      else {
        $messages['error'] = 'כתובת דוא"ל אינה נכונה';
      }
      echo json_encode($messages);
    }

  else {
    die();
  }

  die();

}