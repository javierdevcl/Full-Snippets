<html>
<head>
	<meta charset="utf-8">
	<title>Engel Spy - פתרונות לאיסוף מודיעין</title>
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<meta name="description" content="">
	<meta name="keywords" content="">
	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="stylesheet" type="text/css" href="fonts/fonts.css">
	<script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
	<script src="js/jquery.validate.min.js"></script>
	<script src="js/script.js"></script>
</head>

	<body>
		<header>
			<div class="pagewrap clearfix">
				<div class="hrs">
					<h2>שעות פעילות</h2>
					<p>
						א׳ - ה׳ - 20:30 - 9:30<br />
						ו׳ וערבי חג - 9:30 - 14:00
					</p>
				</div>
				<div class="logo" role="logo">
					<img src="img/logo.png" alt="Logo" />
				</div>
				<a class="dail" href="tel:03-50-92-007">
					<h2>חייגו עכשיו</h2>
					<p>03-50-92-007</p>
				</a>
			</div>
		</header>

		<div class="pagewrap">

			<section class="boxes clearfix">
				<div class="main">
					<div class="titles">
						<h1>שמים סוף לחשדות!</h1>
						<h2>כל ציוד הבילוש והמעקב במקום אחד</h2>
					</div>
				</div>
				<div class="small">
					<div class="box box_1">
						<h3>התקנת מצלמות גלויות ונסתרות</h3>
					</div>
					<div class="box box_2">
						<h3>בדיקות האזנת סתר וחשיפת מכשירי הקלטה ומצלמות נסתרות</h3>
					</div>
					<div class="box box_3"><h3>מכירת ציוד בילוש והתאמת המוצר על פי בקשת הלקוח</h3></div>
				</div>
			</section>

			<section class="contact">
				<div class="form_wrapper">			
					<?php if($_POST):?>
						<div class="success">
		                    <h3>ההודעה נשלחה בהצלחה. נחזור אליך בהקדם!</h3>
		                </div>
		            <?php else:?>
						<h2>צור איתנו קשר עוד היום למידע נוסף</h2>
		            	<form class="contact_form clearfix" method="post">
							<div class="input_wrapper"><input type="text" name="name" placeholder="שם: " class="req" required /></div>
							<div class="input_wrapper"><input type="tel" name="phone" placeholder="טלפון: " class="req" required /></div>
							<div class="input_wrapper"><input type="email" name="email" placeholder="דוא''ל " /></div>
							<div class="submit_wrapper"><input id="submit" type="submit" value="שלח פרטים" name="form_submit" /></div>
						</form>
	            	<?php endif;?>
				</div>
			</section>

			<footer id="footer" class="clearfix">
				<a href="http://www.extrainteractive.co.il/" target="_blank" class="extra">	
					<img src="img/logo-extra.jpg" alt="Powered by Extra Interactive" title="Powered by Extra Interactive">
				</a>
			</footer>
		</div>

	</body>
</html>

<!-- contact form - server side -->
	<?php
	function ifset(&$var, $else = '') {
	    return isset($var) && $var ? $var : $else;
	}

	if($_POST) {

	    $name 	 = filter_var($_POST["name"], FILTER_SANITIZE_STRING);
	    $phone 	 = filter_var($_POST["phone"], FILTER_SANITIZE_NUMBER_INT);
	    $email 	 = filter_var($_POST["email"], FILTER_SANITIZE_EMAIL);

	    $error = false;

	    if(empty($_POST['name'])) {
	        $errname = '<span>בבקשה כתוב שם מלא</span><br />'; 
	        $error	= true;
	    }

	    if(!filter_var($phone, FILTER_SANITIZE_NUMBER_FLOAT)) {
	        $errphone = '<span>כתוב מספרים בלבד במספר הטלפון</span><br />';
	        $error = true;
	    }

	    if ($error) {
	        echo ifset($errname);
	        echo ifset($errphone);
	    }

	    else {
	        $to      = 'yuvalsabar@gmail.com';
	        $subject = 'הודעה מדף נחיתה Engel Spy';
	        $message = 'נרשם משתמש חדש בדף הנחיתה' . "\r\n" . 'שם: ' . $name . "\r\n" . 'טלפון: ' . $phone . "\r\n" . 'דוא"ל: ' . $email;
	        $headers = 'From: Engelspy@engelspy.com' . "\r\n" .
	            'X-Mailer: PHP/' . phpversion();

	        mail($to, $subject, $message, $headers);
	        exit();
	    }
	}
	?>
<!-- /contact form - server side -->