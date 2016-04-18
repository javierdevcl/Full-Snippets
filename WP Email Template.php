<?php /* Template name: אימייל */ get_header();?>

<div class="container container_small">
    <div class="page_content clearfix">
        <form method="post">
            <div class="submit_wrapper"><input id="submit" type="submit" value="שלח פרטים" name="form_submit" /></div>
        </form>
        <?php if($_POST):?>
            <div class="success">
                <h3>ההודעה נשלחה בהצלחה. נחזור אליך בהקדם!</h3>
            </div>
        <?php endif;?>
    </div><!-- page_content -->
</div><!-- /container -->

<?php ob_start();?>
<html>
    <body>
        <div class="someclass">
            <h1>hello world</h1>
        </div>
    </body>
</html>
<?php $html = ob_get_clean();?>

<?php get_footer();?>

<!-- contact form - server side -->
<?php
    function ifset(&$var, $else = '') {
        return isset($var) && $var ? $var : $else;
    }

    if($_POST) {
        $to      = 'yuvalsabar@gmail.com';
        $subject = 'בדיקת מייל';
        $message = $html;
        $headers = "From: Check <check@lironmor.com>" . "\r\n" .
               "Content-type: text/html" . "\r\n";


        mail($to, $subject, $message, $headers);
        exit();
    }
?>


<!-- /contact form - server side -->