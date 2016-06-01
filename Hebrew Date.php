function hebrew_date($date){
    $month	= date("m", $date);
    $day	= date("d", $date);
    $year 	= date("Y", $date);

    $hebrew_date =  jdtojewish( gregoriantojd( $month, $day, $year ), true, CAL_JEWISH_ADD_GERESHAYIM );
    $hebrew_date = iconv( 'WINDOWS-1255', 'UTF-8', $hebrew_date );

    echo $hebrew_date;
}

<?php hebrew_date(get_the_time('U'));?>