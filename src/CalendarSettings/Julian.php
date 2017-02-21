<?php

 use OpenCafe\Datium as Datium;

 return [

 'numbers' => array( '0', '1', '2', '3', '4', '5', '6', '7', '8', '9'),

 'am_time' => 'AM',

 'pm_time' => 'PM',

 'end_of_days' => array( 'th', 'st', 'nd', 'rd' ),



 /************************************************************
  *                        Convert to
  ************************************************************
  *
  * Convert algorith to convert Gregorian to Julian calerndar
  *
  *\_________________________________________________________/
  */
   'convert_to' => function ($date_time) {

     $year = $date_time->format('Y');

     $month = $date_time->format('m');

     $day = $date_time->format('d');

     $jd = gregoriantojd($month, $day, $year);

     $date = explode('/', jdtojulian( $jd ));

     $date_time->setDate($date[2], $date[0], $date[1]);

     return $date_time;

   },

    /************************************************************
    *                        Convert From
    ************************************************************
    *
    * Convert algorith to convert Julian to Gregorian calerndar
    *
    *\_________________________________________________________/
    */
    'convert_from' => function ($date_time) {

      $year = $date_time->format('Y');

      $month = $date_time->format('m');

      $day = $date_time->format('d');

      $date = juliantojd( $month, $day, $year );

      $date = explode('/', JDToGregorian( $date ) );

      $date_time->setDate($date[2], $date[0], $date[1]);

      return $date_time;

    },

    /************************************************************
    *               Shorthand for Julian calendar
    ************************************************************
    *
    * Julian calendar shorthand
    *
    *\_________________________________________________________/
    */
    'shorthand' => 'ju',

    /************************************************************
    *                        Month's name
    ************************************************************
    *
    * Julian month name
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
    * Here is week days on Julian calendar, offset 0 is first
    * day of week and offset 6 is the last one.
    *
    *\_________________________________________________________/
    */
    'days_of_week' => array (

       'Monday',
       'Tuesday',
       'Wednesday',
       'Thursday',
       'Friday',
       'Saturday',
       'Sunday',
    ),


    'month_days_number' => array(  1 => 31,
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


    'day_of_year' => function ($date_time) {

        $result = null;

        $_month = null;

        $config = include 'Julian.php';

        $month = $date_time->format('n');

        $day = $date_time->format('d');

        foreach ($config['month_days_number'] as $_month => $value) {
            if ($_month < $month) {
                $result += $value;
            }
        }

        $result += $day;

        return $result;

    },

    'day_of_week' => function ($date_time) {

        $config = include 'Julian.php';

        $day = $date_time->format('l');

        foreach ($config['days_of_week'] as $key => $value) {
            if ($value == $day) {
                return $key += 1;
            }
        }

    },

    /************************************************************
    *                       Leap year
    ************************************************************
    *
    * Leap Year formula on Julian calendar
    *
    *\_________________________________________________________/
    */
    'leap_year' => function ($year) {

        return ( ( ( $year % 4 ) == 0 ) && ( ( ( $year % 100 ) != 0 ) || ( ( $year % 400 ) == 0 ) ) );

    },

    /************************************************************
    *                        Weekend
    ************************************************************
    *
    * Julian weekend
    *
    *\_________________________________________________________/
    */
    'weekend' => array( 'saturday', 'sunday' ),

  ];
