<?php

use OpenCafe\Datium as Datium;
use OpenCafe\Tools\Leap as Leap;

return array (

  'language' =>  'ku',

  'events' => array(),

  'numbers' => array( '0', '1', '2', '3', '4', '5', '6', '7', '8', '9'),

  'am_time' => 'AM',

  'pm_time' => 'PM',

  'end_of_days' => array( 'th', 'st', 'nd', 'rd' ),



/************************************************************
 *                        Convert to
 ************************************************************
 *
 * Convert algorith to convert Gregorian to Kurdish calerndar
 *
 *\_________________________________________________________/
 */
  'convert_to' => function ($date_time) {

        $jalali = include 'Jalali.php';

        $date_time = $jalali['convert_to']($date_time);

        $date_time->modify('+1321 year');

        return $date_time;
  },

  /************************************************************
   *                        Convert From
   ************************************************************
   *
   * Convert algorith to convert Kurdish to Gregorian calerndar
   *
   *\_________________________________________________________/
   */
  'convert_from' => function ($date_time) {

    $jalali = include 'Jalali.php';

    $date_time->modify('-1321 year');

    $date_time = $jalali['convert_from']($date_time);

    return $date_time;


  },

  /************************************************************
   *               Shorthand for kurdish calendar
   ************************************************************
   *
   * Kurdish calendar shorthand
   *
   *\_________________________________________________________/
   */
  'shorthand' => 'ku',

  /************************************************************
   *                        Month's name
   ************************************************************
   *
   * Jalali month name
   *
   *\_________________________________________________________/
   */
  'month' => array (

    'Xakelêw',

    'Gulan',

    'Cozerdan',

    'Puşper',

    'Gelawêj',

    'Xermanan',

    'Rezber',

    'Gelarêzan',

    'Sermawez',

    'Befranbar',

    'Rêbendan',

    'Reşeme'

    ),

  /************************************************************
   *                        Days of Week
   ************************************************************
   *
   * Here is week days on kurdish calendar, offset 0 is first
   * day of week and offset 6 is the last one.
   *
   *\_________________________________________________________/
   */


  'days_of_week' => array (

     'Yekşeme',
     'Dúşeme',
     'Séşeme',
     'Çúwarşeme',
     'Péncşeme',
     'Heyní',
     'Şeme',

  ),

  'start_day_of_week' => 'Şeme',

  'month_days_number' => array(      1 => 31,
                                     2 => 31,
                                     3 => 31,
                                     4 => 31,
                                     5 => 31,
                                     6 => 31,
                                     7 => 30,
                                     8 => 30,
                                     9 => 30,
                                     10 => 30,
                                     11 => 30,
                                     12 => 29 ),

  /************************************************************
  *                      Day of year
  ************************************************************
  *
  *  Return days of year on Kurdish cleander
  *
  *\_________________________________________________________/
  */
  'day_of_year' => function ($date_time) {

    $result = null;

    $config = include 'Kurdish.php';

    $month = $date_time->format('n');

    $day = $date_time->format('d');

    foreach ($config[ 'month_days_number' ] as $_month => $value) {
        if ($_month < $month) {
            $result += $value;
        }
    }

    $result += $day;

    return $result;

  },

  /************************************************************
   *                       Day of Week
   ************************************************************
   *
   *  Return day of week on Kurdish cleander
   *  example : Yekshanbe = result is 2
   *\_________________________________________________________/
  */
  'day_of_week' => function ($date_tim, $day_of_week) {

      $days_of_week = array(
          'Dúşeme',
          'Séşeme',
          'Çúwarşeme',
          'Péncşeme',
          'Heyní',
          'Şeme',
          'Yekşeme',
      );

      $days = array(
          1 => 'Şeme',
          2 => 'Yekşeme',
          3 => 'Dúşeme',
          4 => 'Séşeme',
          5 => 'Çúwarşeme',
          6 => 'Péncşeme',
          7 => 'Heyní'
      );

        $configGregorian = include 'Gregorian.php';

        $day = str_replace(
            $configGregorian[ 'days_of_week' ],
            $days_of_week,
            $day_of_week
        );

        foreach ($days as $key => $value) {
            if ($day == $value) {
               return $key;
            }
        }

  },

  /************************************************************
   *                       Leap year
   ************************************************************
   *
   * Leap Year formula on Kurdish calendar
   *
   *\_________________________________________________________/
   */
  'leap_year' => function ($year) {

     $a = 0.025;

     $b = 266;

    if ($year > 0) {
        $leapDays0 = (($year + 38) % 2820)*0.24219 + $a;
        // 0.24219 ~ extra days of one year
        $leapDays1 = (($year + 39) % 2820)*0.24219 + $a;
        // 38 days is the difference of epoch to 2820-year cycle
    } elseif ($year < 0) {
        $leapDays0 = (($year + 39) % 2820)*0.24219 + $a;
        $leapDays1 = (($year + 40) % 2820)*0.24219 + $a;
    } else {
        return false;
    }

     $frac0 = intval(($leapDays0 - intval($leapDays0))*1000);
     $frac1 = intval(($leapDays1 - intval($leapDays1))*1000);

    if ($frac0 <= $b && $frac1 > $b) {
        return true;
    } else {
        return false;
    }

  },

  /************************************************************
   *                        Weekend
   ************************************************************
   *
   * Kurdish weekend
   *
   *\_________________________________________________________/
   */
  'weekend' => array( 'friday' )

 );
