<?php

use OpenCafe\Datium as Datium;
use OpenCafe\Tools\Leap as Leap;

return array (

 /************************************************************
  *                        Convert to
  ************************************************************
  *
  * Convert algorith to convert Gregorian to Hijri calerndar
  *
  *\_________________________________________________________/
  */
   'convert_to' => function ($date_time) {

     $config = include 'Jalali.php';

     $date_time = Datium::create($date_time)->to('jalali')->object();

     $year = $date_time->format('Y');

     $month = $date_time->format('n');

     $day = $date_time->format('d');

     $temp_day = 0 ;

    for ($i = 1; $i < $month; $i++) {
        $temp_day += $config[ 'month_days_number' ][ $i ];
    }

      $temp_day += $day;

      $leap = new Leap($year);

    if ($leap->get() && $month > 11) {
        $temp_day++;
    }

     $_year = ( ( ( ( ( $year - 1 ) * 365.2422 ) + $temp_day ) - 119) / 354.3670 ) + 1;

     $_year = explode('.', $_year);

     $year = $_year[0];

     $_month = $_year[1];

      $var_temp = '0.0';

    for ($i = strlen($_month); $i > 2; $i--) {
        $var_temp .= '0';
    }

      $var_temp .= '1';

     $_month = $_month * $var_temp ;

     $_month = ( $_month * 12 ) + 1;

     $_month = explode('.', $_month);

     $month = $_month[0];

     $_day = $_month[1];

     $var_temp = '0.0';

    for ($i = strlen($_day); $i > 2; $i--) {
        $var_temp .= '0' ;
    }

     $var_temp .= '1';

     $_day = $_day * $var_temp;

     $_day = ( $_day * 29.530 );

     $_day = explode('.', $_day);

     $day = $_day[0];

    $date_time->setDate($year, $month, $day);

    return $date_time;

   },

    /************************************************************
    *                        Convert From
    ************************************************************
    *
    * Convert algorith to convert Hijri to Gregorian calerndar
    *
    *\_________________________________________________________/
    */
    'convert_from' => function ($date_time) {

        $config = include 'Gregorian.php';

        $year = $date_time->format('Y');

        $month = $date_time->format('m');

        $day = $date_time->format('d');

        $jd = (int)((11 * $year + 3) / 30) + 354 * $year +
              30 * $month -(int)(($month - 1) / 2) + $day + 1948440 - 385;

        $result = explode('/', jdtogregorian($jd));

        $month = $result[0];

        $day = $result[1];

        $year = $result[2];

        if (! $day || $config['leap_year']($year - 1) ) {
            $day++;
        }

        $date_time->setDate($year, $month, $day);

        return $date_time;


    },

    /************************************************************
    *               Shorthand for Hijri calendar
    ************************************************************
    *
    * Hijri calendar shorthand
    *
    *\_________________________________________________________/
    */
    'shorthand' => 'hi',

    /************************************************************
    *                        Month's name
    ************************************************************
    *
    * Hijri month name
    *
    *\_________________________________________________________/
    */
    'month' => array (

        'Muharram',

        'Safar',

        'Rabi I',

        'Rabi II',

        'Jumada I',

        'Jumada II',

        'Rajab',

        'Shaban',

        'Ramadan',

        'Shawwal',

        'Dhu al_Qadah',

        'Dhu al_Hijjah'

     ),

    /************************************************************
    *                        Days of Week
    ************************************************************
    *
    * Here is week days on Hijri calendar, offset 0 is first
    * day of week and offset 6 is the last one.
    *
    *\_________________________________________________________/
    */
    'days_of_week' => array (

         'al-Aḥad',
         'al-Ithnayn',
         'ath-Thulatha\'',
         'al-Arbi\'a',
         'al-Khamees',
         'al-Jumu\'ah',
         'as-Sabt',
    ),

    'numbers' => array( '0', '1', '2', '3', '4', '5', '6', '7', '8', '9'),

    'am_time' => 'AM',

    'pm_time' => 'PM',

    'end_of_days' => array( 'th', 'st', 'nd', 'rd' ),




    'month_days_number' => array(    1 => 30,
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
    /************************************************************
    *                      Day of year
    ************************************************************
    *
    *  Return days of year on Hijri cleander
    *
    *\_________________________________________________________/
    */
     'day_of_year' => function ($date_time) {

        $result = null;

        $config = include 'Hijri.php';

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

     /************************************************************
      *                      Day of week
      ************************************************************
      *
      *  Return day of week on Hijri calendar
      *  example : al-Aḥad = result is 1
      *\_________________________________________________________/
      */
     'day_of_week' => function ($date_time, $day_of_week) {

         $days_of_week = array(
            'al-Ithnayn',
            'ath-Thulatha\'',
            'al-Arbi\'a',
            'al-Khamees',
            'al-Jumu\'ah',
            'as-Sabt',
            'al-Aḥad',
         );

         $days = array(
            1 => 'al-Aḥad',
            2 => 'al-Ithnayn',
            3 => 'ath-Thulatha\'',
            4 => 'al-Arbi\'a',
            5 => 'al-Khamees',
            6 => 'al-Jumu\'ah',
            7 => 'as-Sabt',
         );

        $configGregorian = include 'Gregorian.php';

        $day = str_replace($configGregorian['days_of_week'], $days_of_week, $day_of_week);

        foreach ($days as $key => $value) {
            if ($value == $day) {
                return $key;
            }
        }

     },

     /************************************************************
      *                       Leap year
      ************************************************************
      *
      * Leap Year formula on Hijri calendar
      *
      *\_________________________________________________________/
      */
     'leap_year' => function ($year) {
        $result = $this->year % 30;

        if (( 2 == $result )
            || ( 5 == $result )
            || ( 7 == $result )
            || ( 10 == $result )
            || ( 13 == $result )
            || ( 16 == $result )
            || ( 18 == $result )
            || ( 21 == $result )
            || ( 24 == $year )
            || ( 26 == $result )
            || ( 29 == $result )
        ) {
            return $result;
        }
     },

    /************************************************************
    *                        Weekend
    ************************************************************
    *
    * weekend in Hijri calendar / arabic countries and some islamic countries
    *
    *\_________________________________________________________/
    */
    'weekend' => array( 'friday', 'saturday' ),

  );
