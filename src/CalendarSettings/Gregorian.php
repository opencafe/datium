``<?php

 use Datium\Datium as Datium;

 return array (

 'numbers' => array( '0', '1', '2', '3', '4', '5', '6', '7', '8', '9'),

 'day_to_nigh' => 'AM',

 'night_to_day' => 'PM',

 'end_of_days_number' => 'th',



 /************************************************************
  *                        Convert to
  ************************************************************
  *
  * Convert algorith to convert Gregorian to Jalali calerndar
  *
  *\_________________________________________________________/
  */
   'convert_to' => function( $date_time ) {

     return null;

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

     return null;

   },

   /************************************************************
    *               Shorthand for jalali calendar
    ************************************************************
    *
    * Jalali calendar shorthand
    *
    *\_________________________________________________________/
    */
   'shorthand' => 'gr',

   /************************************************************
    *                        Month's name
    ************************************************************
    *
    * Jalali month name
    *
    *\_________________________________________________________/
    */
    'month' => array(

      'January',

      'February',

      'March',

      'April',

      'May',

      'June',

      'July',

      'August',

      'September',

      'October',

      'November',

      'December'

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

       'Sunday',
       'Monday',
       'Tuesday',
       'Wednesday',
       'Thursday',
       'Friday',
       'Saturday'


   ),

   'month_days_number' => array(   1 => 31,
                                   2 => 28,
                                   3 => 31,
                                   4 => 30,
                                   5 => 31,
                                   6 => 30,
                                   7 => 31,
                                   8 => 31,
                                   9 => 30,
                                   10 => 31,
                                   11 => 30,
                                   12 => 30 ),


   'day_of_year' => function( $date_time ) {

     $result = null;

     $_month = null;

     $config = include( 'Gregorian.php' );

     $month = $date_time->format('n');

     $day = $date_time->format('d');

     foreach( $config['month_days_number'] as $_month => $value ) {

       if ( $_month < $month ) $result += $value;

     }

     $result += $day;

     return $result;

   },

  'day_of_week' => function( $date_time ) {

       return date( 'w', strtotime( $date_time->format('Y-m-d H:i:s') ) );

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
