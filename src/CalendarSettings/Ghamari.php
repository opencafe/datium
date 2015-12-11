<?php

 return array (

 /************************************************************
  *                        Convert to
  ************************************************************
  *
  * Convert algorith to convert Gregorian to Jalali calerndar
  *
  *\_________________________________________________________/
  */
   'convert_to' => function( $date_time ) {

     $config = include( 'Shamsi.php' );

     $date_time = Datium\Datium::create( $date_time )->to( 'shamsi' )->object();

     $year = $date_time->format('Y');

     $month = $date_time->format('n');

     $day = $date_time->format('d');

     $temp_day = 0 ;

     for ( $i = 1 ; $i < $month ; $i++ ) {

         $temp_day += $config[ 'month_days_number' ][ $i ];

       }

      $temp_day += $day;

      $leap = new Datium\Tools\Leap( $year );

     if( $leap->get() && $month > 11 ) $temp_day++;

     $_year = ( ( ( ( ( $year - 1 ) * 365.2422 ) + $temp_day ) - 119) / 354.3670 ) + 1;

     $_year = explode( '.', $_year );

     $year = $_year[0];

     $_month = $_year[1];

      $var_temp = '0.0';

       for ( $i = strlen( $_month ); $i > 2; $i-- ) {

         $var_temp .= '0';

      }

      $var_temp .= '1';

     $_month = $_month * $var_temp ;

     $_month = ( $_month * 12 ) + 1;

     $_month = explode( '.', $_month );

     $month = $_month[0];

     $_day = $_month[1];

     $var_temp = '0.0';

     for ( $i = strlen( $_day );  $i > 2;  $i-- ) {

        $var_temp .= '0' ;

     }

     $var_temp .= '1';

     $_day = $_day * $var_temp;

     $_day = ( $_day * 29.530 );

     $_day = explode( '.', $_day );

     $day = $_day[0];

    $date_time->setDate( $year, $month, $day );

    return $date_time;

   },

   /************************************************************
    *                        Convert From
    ************************************************************
    *
    * Convert algorith to convert Jalali to Gregorian calerndar
    *
    *\_________________________________________________________/
    */
   'convert_from' => function( $date_time ) {

     $config = include('Ghamari.php');

     $year = $date_time->format('Y');

     $month = $date_time->format('m');

     $day = $date_time->format('d');

     $days_of_year = 0;

     foreach ( $config['month_days_number'] as $month => $value ) {

       if( $month > $month ) $days_of_year += $value;

     }

     $days_of_year += $day;

     $days_of_leap_years =  intval( ( ( $year - 1 ) / 3 )  );

     $days_of_ghamari_years = ( ( ( $year - 1 ) * 354 ) + $days_of_year + $days_of_leap_years );

     $days_of_gregorain_years = $days_of_ghamari_years + 227078;

     $days_of_gregorain_years = $days_of_gregorain_years - intval( ( ( $year + 578 ) / 4 ) );

     $gregorian_month = ( $days_of_gregorain_years % 365 );

     $gregorian_year = intval( $days_of_gregorain_years / 365 ) + 1;

     $config = include('Gregorian.php');

     foreach ($config [ 'month_days_number' ] as $month => $value) {

       if ( $gregorian_month < $value ) {

         break;
       }

         $gregorian_month -= $value;
     }

       $gregorian_day = $gregorian_month;

       $gregorian_month = $month;

       $date_time->setDate( $gregorian_year, $gregorian_month, $gregorian_day );

      return $date_time;


   },

   /************************************************************
    *               Shorthand for jalali calendar
    ************************************************************
    *
    * Jalali calendar shorthand
    *
    *\_________________________________________________________/
    */
   'shorthand' => 'sh',

   /************************************************************
    *                        Month's name
    ************************************************************
    *
    * Jalali month name
    *
    *\_________________________________________________________/
    */
   'month' => array (

     'Farvardin',

     'Ordibehesht',

     'Khordad',

     'Tir',

     'Mordad',

     'Shahrivar',

     'Mehr',

     'Aban',

     'Azar',

     'Dey',

     'Bahman',

     'Esfand'

     ),

   /************************************************************
    *                        Days of Week
    ************************************************************
    *
    * Here is week days on jalali calendar, offset 0 is first
    * day of week and offset 6 is the last one.
    *
    *\_________________________________________________________/
    */
   'days_of_week' => array (

     'Shanbe',

     'Yek-Shanbe',

     'Do-Shanbe',

     'Se-Shanbe',

     'Chahar-Shanbe',

     'Panj-Shanbe',

     'Jome'

   ),

   'month_days_number' => array(     1 => 30,
                                     2 => 29,
                                     3 => 30,
                                     4 => 30,
                                     5 => 29,
                                     6 => 29,
                                     7 => 30,
                                     8 => 29,
                                     9 => 30,
                                     10 => 29,
                                     11 => 30,
                                     12 => 30 ),

     'day_of_year' => function( $date_time ) {

       $result = null;

       $config = include( 'Ghamari.php' );

       $month = $date_time->format('n');

       $day = $date_time->format('d');

       foreach( $config['month_days_number'] as $_month => $value ) {

         if ( $_month < $month ) {

           $result += $value;

         }

       }

       $result += $day;

       return $result;

     },

     /************************************************************
      *                       Leap year
      ************************************************************
      *
      * Leap Year formula on jalali calendar
      *
      *\_________________________________________________________/
      */
     'leap_year' => null,

   /************************************************************
    *                        Weekend
    ************************************************************
    *
    * Jalali weekend
    *
    *\_________________________________________________________/
    */
   'weekend' => array( 'friday' )

  );
