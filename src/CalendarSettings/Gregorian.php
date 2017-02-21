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
  * Convert to Gregorian 
  *
  *\_________________________________________________________/
  */
   'convert_to' => function ($date_time) {

     return null;

   },

    /************************************************************
    *                        Convert From
    ************************************************************
    *
    * Convert algorith to convert form x to Gregorian 
    *
    *\_________________________________________________________/
    */
    'convert_from' => function ($date_time) {

        return null;

    },

    /************************************************************
    *               Shorthand for Gregorian calendar
    ************************************************************
    *
    * Gregorian calendar shorthand
    *
    *\_________________________________________________________/
    */
    'shorthand' => 'gr',

    /************************************************************
    *                        Month's name
    ************************************************************
    *
    * Gregorian month name
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
    * Here is week days on Gregorian calendar, offset 0 is first
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


    'day_of_year' => function ($date_time) {

        $result = null;

        $_month = null;

        $config = include 'Gregorian.php';

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

        $config = include 'Gregorian.php';

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
    * Leap Year formula on Gregorian calendar
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
    * Gregorian weekend
    *
    *\_________________________________________________________/
    */
    'weekend' => array( 'saturday', 'sunday' ),

  ];
